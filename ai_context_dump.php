<?php
/**
 * ═══════════════════════════════════════════════════════════════════════════
 *  AI Context Dump — Laravel Project Analyzer (v2.0)
 * ═══════════════════════════════════════════════════════════════════════════
 *
 *  سكربت مستقل تماماً (ملف واحد، بدون Composer، بدون أي مكتبة خارجية)
 *  يجمع كل ما لمسته في مشروع Laravel ويولّد تقريرين شاملين:
 *      ▸ ai_context_report.html   (تفاعلي — للاستعراض)
 *      ▸ ai_context_report.md     (نصّي  — لتغذية AI مباشرة)
 *
 *  وضعان للتشغيل:
 *      ▸ CLI:      php ai_context_dump.php
 *      ▸ Browser:  http://localhost/ai_context_dump.php   (localhost فقط!)
 *
 *  ═════════════════════════════════════════════════════════════════
 *   ⚠️  تحذير أمني مهم جداً — اقرأ قبل الاستخدام
 *  ═════════════════════════════════════════════════════════════════
 *
 *  هذه النسخة تكشف **جميع** بيانات الاتصال بقاعدة البيانات وكل الأسرار
 *  في ملف .env (APP_KEY, DB_PASSWORD, MAIL_PASSWORD, API keys...) لتغذية
 *  الذكاء الاصطناعي بصورة كاملة عن المشروع.
 *
 *  ⚠  الملفات المولَّدة تحتوي على أسرار حقيقية.
 *  ⚠  لا ترفعها إلى Git ولا تشاركها علناً.
 *  ⚠  أضف الأسطر التالية إلى ملف .gitignore:
 *          ai_context_dump.php
 *          ai_context_report.html
 *          ai_context_report.md
 *  ⚠  احذف الملفين بعد إرسال المحتوى للـ AI.
 *  ⚠  في وضع المتصفح: السكربت يرفض أي طلب من IP غير localhost.
 *
 *  المتطلبات: PHP 8.1+ فأعلى (PDO مفعّل للـ DB اختيارياً)
 *  الترخيص: MIT
 *
 * ═══════════════════════════════════════════════════════════════════════════
 */

declare(strict_types=1);


// ═══════════════════════════════════════════════════════════════════════════
// 【1】 كشف الوضع: CLI أم Browser؟
// ═══════════════════════════════════════════════════════════════════════════
$IS_CLI = (PHP_SAPI === 'cli');

if (PHP_VERSION_ID < 80100) {
    $msg = "Error: PHP 8.1+ required. You have " . PHP_VERSION;
    $IS_CLI ? fwrite(STDERR, "$msg\n") : print("<pre>$msg</pre>");
    exit(1);
}


// ═══════════════════════════════════════════════════════════════════════════
// 【2】 الإعدادات
// ═══════════════════════════════════════════════════════════════════════════
final class Config
{
    /** الحد الأقصى لحجم أي ملف يُقرأ (بايت) */
    public const MAX_FILE_SIZE = 524288; // 512 KB

    /** المجلدات التي نمشي فيها */
    public const SCAN_DIRECTORIES = [
        'app', 'routes',
        'database/migrations', 'database/seeders', 'database/factories',
        'resources/views', 'resources/js', 'resources/css', 'resources/sass',
        'config', 'tests', 'lang', 'stubs',
    ];

    /** ملفات جذرية نقرأها مباشرة */
    public const ROOT_FILES = [
        'composer.json', 'package.json', 'artisan',
        '.env', '.env.example',
        'phpunit.xml', 'vite.config.js', 'vite.config.ts',
        'webpack.mix.js', 'tailwind.config.js', 'postcss.config.js',
        'tsconfig.json', 'README.md',
        'bootstrap/app.php', 'bootstrap/providers.php',
    ];

    /** أنماط مسارات مستبعدة كلياً */
    public const EXCLUDED_PATH_PATTERNS = [
        'vendor', 'node_modules', 'storage/framework', 'storage/logs',
        'storage/app/public', 'bootstrap/cache', '.git', '.idea', '.vscode',
        'public/build', 'public/hot', 'public/storage', '.phpunit.cache',
        'coverage', '.next', 'dist',
    ];

    /** ملفات ثنائية لا نقرأ محتواها */
    public const BINARY_EXTENSIONS = [
        'png', 'jpg', 'jpeg', 'gif', 'webp', 'ico',
        'pdf', 'zip', 'tar', 'gz', 'rar', '7z',
        'mp3', 'mp4', 'wav', 'ogg', 'webm', 'avi',
        'woff', 'woff2', 'ttf', 'eot', 'otf',
        'exe', 'dll', 'so', 'dylib', 'bin',
    ];

    /** عناوين IP مسموح لها بالوصول عبر HTTP */
    public const ALLOWED_HTTP_IPS = [
        '127.0.0.1', '::1', 'localhost',
        '0:0:0:0:0:0:0:1',   // IPv6 loopback full form
        // add '192.168.*.*' هنا لو أردت الوصول من شبكتك المحلية
    ];
}


// ═══════════════════════════════════════════════════════════════════════════
// 【3】 حراسة المتصفح — رفض أي طلب من IP غير localhost
// ═══════════════════════════════════════════════════════════════════════════
final class BrowserGuard
{
    public static function enforce(): void
    {
        $remote = $_SERVER['REMOTE_ADDR'] ?? '';
        if (self::isLocalhost($remote)) {
            return;
        }
        // رفض الوصول
        http_response_code(403);
        header('Content-Type: text/html; charset=utf-8');
        echo self::forbiddenPage($remote);
        exit;
    }

    public static function isLocalhost(string $ip): bool
    {
        if ($ip === '') {
            return false;
        }
        foreach (Config::ALLOWED_HTTP_IPS as $allowed) {
            if ($ip === $allowed) {
                return true;
            }
        }
        return false;
    }

    private static function forbiddenPage(string $ip): string
    {
        $safeIp = htmlspecialchars($ip, ENT_QUOTES);
        return <<<HTML
<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8">
<meta name="robots" content="noindex,nofollow"><title>403 Forbidden</title>
<style>
body{font-family:system-ui,sans-serif;background:#0f172a;color:#e2e8f0;
     display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
.box{background:#1e293b;padding:40px;border-radius:12px;max-width:500px;
     border-left:4px solid #dc2626}
h1{color:#f87171;margin:0 0 12px}
code{background:#0f172a;padding:2px 8px;border-radius:4px;color:#fbbf24}
</style></head><body><div class="box">
<h1>🚫 403 Forbidden</h1>
<p>This tool is accessible only from localhost.</p>
<p>Your IP <code>$safeIp</code> is not allowed.</p>
<p>Run it from CLI instead: <code>php ai_context_dump.php</code></p>
</div></body></html>
HTML;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【4】 Logger — يعمل في وضعَي CLI و Browser
// ═══════════════════════════════════════════════════════════════════════════
final class Logger
{
    private const COLORS = [
        'info'  => "\033[36m", 'ok'    => "\033[32m",
        'warn'  => "\033[33m", 'error' => "\033[31m",
        'reset' => "\033[0m",
    ];

    private bool $useColors;
    private array $entries = [];

    public function __construct(private readonly bool $isCli)
    {
        $this->useColors = $this->isCli && (function_exists('posix_isatty') ? @posix_isatty(STDERR) : true);
    }

    public function info(string $msg): void  { $this->write('info',  '›', $msg); }
    public function ok(string $msg): void    { $this->write('ok',    '✓', $msg); }
    public function warn(string $msg): void  { $this->write('warn',  '⚠', $msg); }
    public function error(string $msg): void { $this->write('error', '✗', $msg); }

    /** لاسترجاع سجل الأحداث في وضع المتصفح */
    public function entries(): array { return $this->entries; }

    private function write(string $level, string $icon, string $msg): void
    {
        $this->entries[] = ['level' => $level, 'icon' => $icon, 'msg' => $msg];
        if (!$this->isCli) {
            return; // في وضع المتصفح: نجمع فقط، الإخراج يأتي لاحقاً
        }
        $prefix = $this->useColors
            ? self::COLORS[$level] . $icon . ' ' . self::COLORS['reset']
            : $icon . ' ';
        fwrite(STDERR, $prefix . $msg . PHP_EOL);
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【5】 SafeReader — قراءة ملفات آمنة
// ═══════════════════════════════════════════════════════════════════════════
final class SafeReader
{
    public function __construct(private readonly Logger $log) {}

    public function readText(string $path): ?string
    {
        if (!is_file($path) || !is_readable($path)) {
            return null;
        }
        $size = @filesize($path);
        if ($size === false) {
            return null;
        }
        if ($size > Config::MAX_FILE_SIZE) {
            return sprintf(
                "// [ملف تم تجاوزه: حجمه %s كبير جداً — الحد %s]",
                self::formatBytes($size), self::formatBytes(Config::MAX_FILE_SIZE)
            );
        }
        $content = @file_get_contents($path);
        if ($content === false) {
            return null;
        }
        // كشف الملفات الثنائية
        if (strpos(substr($content, 0, 8192), "\x00") !== false) {
            return "// [ملف ثنائي — لا يُعرض المحتوى]";
        }
        return $content;
    }

    public function readJson(string $path): ?array
    {
        $raw = $this->readText($path);
        if ($raw === null || str_starts_with($raw, '//')) {
            return null;
        }
        try {
            $data = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
            return is_array($data) ? $data : null;
        } catch (\JsonException $e) {
            $this->log->warn("فشل تحليل JSON في: $path");
            return null;
        }
    }

    public static function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }
        return sprintf('%.1f %s', $bytes, $units[$i]);
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【6】 EnvAnalyzer — يعرض كل شيء بلا استثناء (بحسب طلب المستخدم)
// ═══════════════════════════════════════════════════════════════════════════
final class EnvAnalyzer
{
    public function __construct(private readonly SafeReader $reader) {}

    public function analyze(string $envPath): array
    {
        $result = ['exists' => false, 'values' => [], 'total_keys' => 0];

        $raw = $this->reader->readText($envPath);
        if ($raw === null) {
            return $result;
        }
        $result['exists'] = true;

        foreach (preg_split('/\R/', $raw) as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }
            if (!preg_match('/^([A-Z][A-Z0-9_]*)\s*=\s*(.*)$/', $line, $m)) {
                continue;
            }
            $result['values'][$m[1]] = trim($m[2], " \t\"'");
            $result['total_keys']++;
        }
        return $result;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【7】 ProjectMetadata
// ═══════════════════════════════════════════════════════════════════════════
final class ProjectMetadata
{
    public function __construct(
        private readonly string $root,
        private readonly SafeReader $reader,
    ) {}

    public function collect(): array
    {
        return [
            'project_path'      => $this->root,
            'php_version'       => PHP_VERSION,
            'php_sapi'          => PHP_SAPI,
            'os'                => PHP_OS_FAMILY . ' (' . php_uname('s') . ' ' . php_uname('r') . ')',
            'laravel_version'   => $this->detectLaravelVersion(),
            'is_laravel'        => $this->isLaravel(),
            'php_extensions'    => $this->relevantExtensions(),
            'generated_at'      => date('Y-m-d H:i:s T'),
            'generator'         => 'ai_context_dump.php v2.0',
        ];
    }

    private function isLaravel(): bool
    {
        return is_file($this->root . '/artisan') && is_file($this->root . '/composer.json');
    }

    private function detectLaravelVersion(): string
    {
        $lock = $this->reader->readJson($this->root . '/composer.lock');
        if ($lock !== null && isset($lock['packages'])) {
            foreach ($lock['packages'] as $pkg) {
                if (($pkg['name'] ?? '') === 'laravel/framework') {
                    return $pkg['version'] ?? 'unknown';
                }
            }
        }
        $json = $this->reader->readJson($this->root . '/composer.json');
        if ($json !== null && isset($json['require']['laravel/framework'])) {
            return $json['require']['laravel/framework'] . ' (constraint — lock not found)';
        }
        return 'not detected';
    }

    private function relevantExtensions(): array
    {
        $wanted = [
            'pdo', 'pdo_mysql', 'pdo_pgsql', 'pdo_sqlite',
            'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype',
            'json', 'bcmath', 'fileinfo', 'gd', 'imagick',
            'redis', 'memcached', 'sodium', 'curl', 'zip', 'intl',
        ];
        return array_values(array_intersect($wanted, get_loaded_extensions()));
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【8】 ComposerAnalyzer
// ═══════════════════════════════════════════════════════════════════════════
final class ComposerAnalyzer
{
    public function __construct(
        private readonly string $root,
        private readonly SafeReader $reader,
    ) {}

    public function analyze(): array
    {
        $json = $this->reader->readJson($this->root . '/composer.json') ?? [];
        $lock = $this->reader->readJson($this->root . '/composer.lock') ?? [];

        return [
            'project_name'    => $json['name']        ?? null,
            'description'     => $json['description'] ?? null,
            'php_constraint'  => $json['require']['php'] ?? null,
            'production'      => $this->extractPackages($json['require'] ?? [], $lock['packages'] ?? []),
            'development'     => $this->extractPackages($json['require-dev'] ?? [], $lock['packages-dev'] ?? []),
            'autoload'        => $json['autoload'] ?? null,
            'autoload_dev'    => $json['autoload-dev'] ?? null,
            'scripts'         => $json['scripts'] ?? null,
            'total_installed' => count($lock['packages'] ?? []) + count($lock['packages-dev'] ?? []),
        ];
    }

    private function extractPackages(array $required, array $installed): array
    {
        $installedMap = [];
        foreach ($installed as $pkg) {
            if (isset($pkg['name'])) {
                $installedMap[$pkg['name']] = [
                    'installed' => $pkg['version']     ?? 'unknown',
                    'source'    => $pkg['source']['url'] ?? null,
                    'desc'      => $pkg['description'] ?? null,
                ];
            }
        }
        $out = [];
        foreach ($required as $name => $constraint) {
            if ($name === 'php' || str_starts_with($name, 'ext-')) {
                continue;
            }
            $out[$name] = [
                'constraint' => $constraint,
                'installed'  => $installedMap[$name]['installed'] ?? '(not locked)',
                'description'=> $installedMap[$name]['desc'] ?? null,
            ];
        }
        ksort($out);
        return $out;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【9】 NpmAnalyzer
// ═══════════════════════════════════════════════════════════════════════════
final class NpmAnalyzer
{
    public function __construct(
        private readonly string $root,
        private readonly SafeReader $reader,
    ) {}

    public function analyze(): ?array
    {
        $json = $this->reader->readJson($this->root . '/package.json');
        if ($json === null) {
            return null;
        }
        $lock = $this->reader->readJson($this->root . '/package-lock.json');
        $installedMap = [];
        if ($lock !== null && isset($lock['packages'])) {
            foreach ($lock['packages'] as $key => $pkg) {
                if (str_starts_with($key, 'node_modules/')) {
                    $name = substr($key, strlen('node_modules/'));
                    $installedMap[$name] = $pkg['version'] ?? null;
                }
            }
        }
        return [
            'name'          => $json['name'] ?? null,
            'version'       => $json['version'] ?? null,
            'type'          => $json['type'] ?? 'commonjs',
            'production'    => $this->merge($json['dependencies']    ?? [], $installedMap),
            'development'   => $this->merge($json['devDependencies'] ?? [], $installedMap),
            'scripts'       => $json['scripts'] ?? null,
        ];
    }

    private function merge(array $required, array $installedMap): array
    {
        $out = [];
        foreach ($required as $name => $constraint) {
            $out[$name] = [
                'constraint' => $constraint,
                'installed'  => $installedMap[$name] ?? '(not locked)',
            ];
        }
        ksort($out);
        return $out;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【10】 FilesystemScanner
// ═══════════════════════════════════════════════════════════════════════════
final class FilesystemScanner
{
    public function __construct(
        private readonly string $root,
        private readonly SafeReader $reader,
        private readonly Logger $log,
    ) {}

    public function scan(): array
    {
        $groups = [];
        foreach (Config::SCAN_DIRECTORIES as $dir) {
            $full = $this->root . '/' . $dir;
            if (!is_dir($full)) {
                continue;
            }
            $this->log->info("مسح: $dir/");
            $files = $this->walk($full);
            if (!empty($files)) {
                $groups[$dir] = $files;
            }
        }
        $rootFiles = [];
        foreach (Config::ROOT_FILES as $file) {
            $full = $this->root . '/' . $file;
            if (!is_file($full)) {
                continue;
            }
            $collected = $this->collectSingle($full);
            if ($collected !== null) {
                $rootFiles[] = $collected;
            }
        }
        if (!empty($rootFiles)) {
            $groups['(root)'] = $rootFiles;
        }
        return $groups;
    }

    private function walk(string $dir): array
    {
        $collected = [];
        try {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::SELF_FIRST
            );
        } catch (\Throwable $e) {
            $this->log->warn("لا يمكن قراءة $dir: " . $e->getMessage());
            return [];
        }
        foreach ($iterator as $file) {
            /** @var \SplFileInfo $file */
            if (!$file->isFile()) {
                continue;
            }
            $path = $file->getPathname();
            if ($this->isExcluded($path)) {
                continue;
            }
            $collected[] = $this->collectSingle($path);
        }
        return array_values(array_filter($collected));
    }

    private function isExcluded(string $path): bool
    {
        $norm = str_replace('\\', '/', $path);
        foreach (Config::EXCLUDED_PATH_PATTERNS as $pat) {
            if (str_contains($norm, '/' . $pat . '/') || str_ends_with($norm, '/' . $pat)) {
                return true;
            }
        }
        return false;
    }

    private function collectSingle(string $path): ?array
    {
        $ext = $this->guessExtension($path);
        if (in_array($ext, Config::BINARY_EXTENSIONS, true)) {
            return null;
        }
        $size = @filesize($path);
        if ($size === false) {
            return null;
        }
        $content = $this->reader->readText($path);
        if ($content === null) {
            return null;
        }
        return [
            'path'     => $this->relativize($path),
            'ext'      => $ext,
            'size'     => $size,
            'lines'    => substr_count($content, "\n") + 1,
            'content'  => $content,
            'language' => $this->langForExt($ext),
        ];
    }

    private function guessExtension(string $path): string
    {
        if (str_ends_with($path, '.blade.php')) {
            return 'blade.php';
        }
        // .env و .env.example
        $base = basename($path);
        if ($base === '.env' || $base === '.env.example') {
            return 'env';
        }
        return strtolower(pathinfo($path, PATHINFO_EXTENSION));
    }

    private function langForExt(string $ext): string
    {
        return match ($ext) {
            'php', 'blade.php', 'stub' => 'php',
            'js', 'mjs'                => 'javascript',
            'ts'                       => 'typescript',
            'jsx', 'tsx'               => 'jsx',
            'vue'                      => 'vue',
            'json'                     => 'json',
            'css'                      => 'css',
            'scss', 'sass'             => 'scss',
            'html', 'htm'              => 'html',
            'xml'                      => 'xml',
            'yml', 'yaml'              => 'yaml',
            'md'                       => 'markdown',
            'sql'                      => 'sql',
            'env'                      => 'ini',
            default                    => 'text',
        };
    }

    private function relativize(string $path): string
    {
        $abs = str_replace('\\', '/', $path);
        $root = str_replace('\\', '/', $this->root);
        if (str_starts_with($abs, $root . '/')) {
            return substr($abs, strlen($root) + 1);
        }
        return $abs;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【11】 DatabaseAnalyzer — يعرض بيانات الاتصال كاملة بحسب طلب المستخدم
// ═══════════════════════════════════════════════════════════════════════════
final class DatabaseAnalyzer
{
    public function __construct(
        private readonly string $root,
        private readonly Logger $log,
    ) {}

    public function analyze(): array
    {
        $env = $this->parseEnv($this->root . '/.env');
        if (empty($env)) {
            return ['error' => '.env not found — لا يمكن الاتصال بقاعدة البيانات'];
        }

        $driver = $env['DB_CONNECTION'] ?? 'mysql';

        // بيانات الاتصال الكاملة (حسب طلب المستخدم — تُعرض كما هي)
        $connection = [
            'driver'   => $driver,
            'host'     => $env['DB_HOST']     ?? null,
            'port'     => $env['DB_PORT']     ?? null,
            'database' => $env['DB_DATABASE'] ?? null,
            'username' => $env['DB_USERNAME'] ?? null,
            'password' => $env['DB_PASSWORD'] ?? null,
            'charset'  => $env['DB_CHARSET']  ?? 'utf8mb4',
            'socket'   => $env['DB_SOCKET']   ?? null,
        ];

        try {
            $pdo = $this->connect($driver, $env);
        } catch (\Throwable $e) {
            return [
                'error'      => 'فشل الاتصال: ' . $e->getMessage(),
                'connection' => $connection,
            ];
        }

        $this->log->ok("تم الاتصال بـ $driver");

        $schema = match ($driver) {
            'mysql', 'mariadb' => $this->analyzeMysql($pdo, $env['DB_DATABASE'] ?? ''),
            'pgsql'            => $this->analyzePgsql($pdo),
            'sqlite'           => $this->analyzeSqlite($pdo),
            default            => ['error' => "driver غير مدعوم: $driver"],
        };
        $schema['connection'] = $connection;
        return $schema;
    }

    private function parseEnv(string $path): array
    {
        if (!is_file($path) || !is_readable($path)) {
            return [];
        }
        $out = [];
        foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }
            if (preg_match('/^([A-Z][A-Z0-9_]*)\s*=\s*(.*)$/', $line, $m)) {
                $out[$m[1]] = trim($m[2], " \t\"'");
            }
        }
        return $out;
    }

    private function connect(string $driver, array $env): \PDO
    {
        if (!class_exists(\PDO::class)) {
            throw new \RuntimeException('امتداد PDO غير مثبَّت');
        }
        $dsn = match ($driver) {
            'mysql', 'mariadb' => sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
                $env['DB_HOST'] ?? '127.0.0.1',
                $env['DB_PORT'] ?? '3306',
                $env['DB_DATABASE'] ?? ''
            ),
            'pgsql' => sprintf(
                'pgsql:host=%s;port=%s;dbname=%s',
                $env['DB_HOST'] ?? '127.0.0.1',
                $env['DB_PORT'] ?? '5432',
                $env['DB_DATABASE'] ?? ''
            ),
            'sqlite' => 'sqlite:' . $this->resolveSqlitePath($env['DB_DATABASE'] ?? ''),
            default  => throw new \RuntimeException("driver غير مدعوم: $driver"),
        };
        return new \PDO($dsn, $env['DB_USERNAME'] ?? null, $env['DB_PASSWORD'] ?? null, [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_TIMEOUT            => 5,
        ]);
    }

    private function resolveSqlitePath(string $configured): string
    {
        if ($configured === '' || $configured === ':memory:') {
            return $this->root . '/database/database.sqlite';
        }
        return str_starts_with($configured, '/')
            ? $configured
            : $this->root . '/' . $configured;
    }

    private function analyzeMysql(\PDO $pdo, string $database): array
    {
        $tables = [];
        $tableNames = $pdo->query("SHOW TABLES")->fetchAll(\PDO::FETCH_COLUMN) ?: [];
        foreach ($tableNames as $tableName) {
            $columns = $pdo->query("SHOW FULL COLUMNS FROM `$tableName`")->fetchAll();
            $indexes = $pdo->query("SHOW INDEX FROM `$tableName`")->fetchAll();
            $fkStmt = $pdo->prepare(
                "SELECT CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
                 FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                 WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL"
            );
            $fkStmt->execute([$database, $tableName]);
            $foreignKeys = $fkStmt->fetchAll();

            $count = null;
            try {
                $count = (int) $pdo->query("SELECT COUNT(*) FROM `$tableName`")->fetchColumn();
            } catch (\Throwable) { /* تجاهل */ }

            $tables[$tableName] = [
                'columns'      => $columns,
                'indexes'      => $indexes,
                'foreign_keys' => $foreignKeys,
                'row_count'    => $count,
            ];
        }
        return [
            'driver'         => 'mysql',
            'database'       => $database,
            'server_version' => $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION),
            'tables'         => $tables,
            'total_tables'   => count($tables),
        ];
    }

    private function analyzePgsql(\PDO $pdo): array
    {
        $tables = [];
        $tableNames = $pdo->query(
            "SELECT table_name FROM information_schema.tables
             WHERE table_schema = 'public' ORDER BY table_name"
        )->fetchAll(\PDO::FETCH_COLUMN) ?: [];

        foreach ($tableNames as $tableName) {
            $colStmt = $pdo->prepare(
                "SELECT column_name, data_type, is_nullable, column_default, character_maximum_length
                 FROM information_schema.columns
                 WHERE table_schema = 'public' AND table_name = ?
                 ORDER BY ordinal_position"
            );
            $colStmt->execute([$tableName]);
            $count = null;
            try {
                $count = (int) $pdo->query("SELECT COUNT(*) FROM \"$tableName\"")->fetchColumn();
            } catch (\Throwable) { /* تجاهل */ }
            $tables[$tableName] = ['columns' => $colStmt->fetchAll(), 'row_count' => $count];
        }
        return [
            'driver'         => 'pgsql',
            'server_version' => $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION),
            'tables'         => $tables,
            'total_tables'   => count($tables),
        ];
    }

    private function analyzeSqlite(\PDO $pdo): array
    {
        $tables = [];
        $tableNames = $pdo->query(
            "SELECT name FROM sqlite_master
             WHERE type='table' AND name NOT LIKE 'sqlite_%'
             ORDER BY name"
        )->fetchAll(\PDO::FETCH_COLUMN) ?: [];

        foreach ($tableNames as $tableName) {
            $columns = $pdo->query("PRAGMA table_info(`$tableName`)")->fetchAll();
            $indexes = $pdo->query("PRAGMA index_list(`$tableName`)")->fetchAll();
            $foreign = $pdo->query("PRAGMA foreign_key_list(`$tableName`)")->fetchAll();
            $count = null;
            try {
                $count = (int) $pdo->query("SELECT COUNT(*) FROM `$tableName`")->fetchColumn();
            } catch (\Throwable) { /* تجاهل */ }
            $tables[$tableName] = [
                'columns'      => $columns,
                'indexes'      => $indexes,
                'foreign_keys' => $foreign,
                'row_count'    => $count,
            ];
        }
        return [
            'driver'       => 'sqlite',
            'tables'       => $tables,
            'total_tables' => count($tables),
        ];
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【12】 CodeStatistics
// ═══════════════════════════════════════════════════════════════════════════
final class CodeStatistics
{
    public function compute(array $fileGroups): array
    {
        $stats = [
            'total_files'  => 0,
            'total_lines'  => 0,
            'total_bytes'  => 0,
            'by_extension' => [],
            'by_folder'    => [],
            'laravel' => [
                'controllers' => 0, 'models'      => 0, 'migrations'  => 0,
                'requests'    => 0, 'resources'   => 0, 'jobs'        => 0,
                'events'      => 0, 'listeners'   => 0, 'commands'    => 0,
                'policies'    => 0, 'middlewares' => 0, 'observers'   => 0,
                'providers'   => 0, 'seeders'     => 0, 'factories'   => 0,
                'views'       => 0, 'tests'       => 0,
            ],
        ];
        foreach ($fileGroups as $folder => $files) {
            $folderBytes = 0;
            foreach ($files as $file) {
                $stats['total_files']++;
                $stats['total_lines'] += $file['lines'];
                $stats['total_bytes'] += $file['size'];
                $folderBytes += $file['size'];
                $stats['by_extension'][$file['ext']] = ($stats['by_extension'][$file['ext']] ?? 0) + 1;
                $this->classifyLaravel($file['path'], $stats['laravel']);
            }
            $stats['by_folder'][$folder] = ['files' => count($files), 'bytes' => $folderBytes];
        }
        arsort($stats['by_extension']);
        return $stats;
    }

    private function classifyLaravel(string $path, array &$laravel): void
    {
        if (str_contains($path, 'app/Http/Controllers'))    $laravel['controllers']++;
        if (str_contains($path, 'app/Models'))              $laravel['models']++;
        if (str_starts_with($path, 'database/migrations'))  $laravel['migrations']++;
        if (str_starts_with($path, 'database/seeders'))     $laravel['seeders']++;
        if (str_starts_with($path, 'database/factories'))   $laravel['factories']++;
        if (str_contains($path, 'app/Http/Requests'))       $laravel['requests']++;
        if (str_contains($path, 'app/Http/Resources'))      $laravel['resources']++;
        if (str_contains($path, 'app/Jobs'))                $laravel['jobs']++;
        if (str_contains($path, 'app/Events'))              $laravel['events']++;
        if (str_contains($path, 'app/Listeners'))           $laravel['listeners']++;
        if (str_contains($path, 'app/Console/Commands'))    $laravel['commands']++;
        if (str_contains($path, 'app/Policies'))            $laravel['policies']++;
        if (str_contains($path, 'app/Http/Middleware'))     $laravel['middlewares']++;
        if (str_contains($path, 'app/Observers'))           $laravel['observers']++;
        if (str_contains($path, 'app/Providers'))           $laravel['providers']++;
        if (str_ends_with($path, '.blade.php'))             $laravel['views']++;
        if (str_starts_with($path, 'tests/'))               $laravel['tests']++;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【13】 RoutesSummary
// ═══════════════════════════════════════════════════════════════════════════
final class RoutesSummary
{
    public function summarize(array $fileGroups): array
    {
        if (!isset($fileGroups['routes'])) {
            return [];
        }
        $routes = [];
        foreach ($fileGroups['routes'] as $file) {
            $entries = $this->extractRoutes($file['content']);
            if (!empty($entries)) {
                $routes[$file['path']] = $entries;
            }
        }
        return $routes;
    }

    private function extractRoutes(string $content): array
    {
        $found = [];
        $pattern = '/Route::(get|post|put|patch|delete|options|any|match|resource|apiResource)\s*\(\s*[\'"]([^\'"]+)[\'"]/i';
        if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $m) {
                $found[] = ['method' => strtoupper($m[1]), 'uri' => $m[2]];
            }
        }
        return $found;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【14】 HtmlRenderer — تقرير HTML تفاعلي
// ═══════════════════════════════════════════════════════════════════════════
final class HtmlRenderer
{
    public function render(array $data): string
    {
        $meta       = $data['metadata'];
        $composer   = $data['composer'];
        $npm        = $data['npm'];
        $env        = $data['env'];
        $database   = $data['database'];
        $files      = $data['files'];
        $stats      = $data['statistics'];
        $routes     = $data['routes'];

        return "<!DOCTYPE html>\n<html lang=\"ar\" dir=\"rtl\">\n"
            . $this->renderHead($meta)
            . "<body>\n"
            . $this->renderSecurityBanner()
            . "<div class=\"layout\">\n"
            . $this->renderSidebar($files, $stats)
            . "<main class=\"content\">\n"
            . $this->renderMetaSection($meta, $stats)
            . $this->renderComposerSection($composer)
            . ($npm ? $this->renderNpmSection($npm) : '')
            . $this->renderEnvSection($env)
            . $this->renderDatabaseSection($database)
            . $this->renderRoutesSection($routes)
            . $this->renderFilesSection($files)
            . "</main>\n</div>\n"
            . $this->renderScripts()
            . "</body>\n</html>\n";
    }

    private function renderHead(array $meta): string
    {
        $title = 'AI Context Report — ' . htmlspecialchars($meta['project_path'], ENT_QUOTES);
        return "<head>\n"
            . "<meta charset=\"utf-8\">\n"
            . "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n"
            . "<meta name=\"robots\" content=\"noindex,nofollow,noarchive\">\n"
            . "<title>$title</title>\n"
            . "<style>\n" . $this->css() . "\n</style>\n"
            . "</head>\n";
    }

    private function renderSecurityBanner(): string
    {
        return <<<'HTML'
<div class="security-banner">
  <strong>⚠️ تحذير أمني</strong> — هذا التقرير يحتوي على أسرار حقيقية (كلمات مرور قاعدة البيانات، APP_KEY، مفاتيح API).
  لا ترفعه إلى Git، لا تشاركه علناً، احذفه بعد إرساله للـ AI.
</div>
HTML;
    }

    private function css(): string
    {
        return <<<'CSS'
*, *::before, *::after { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  margin: 0; font-family: -apple-system, "Segoe UI", "Cairo", sans-serif;
  font-size: 14px; line-height: 1.65; color: #1a2332;
  background: #f4f6f9; direction: rtl;
}
.security-banner {
  background: linear-gradient(90deg, #dc2626 0%, #991b1b 100%);
  color: #fff; padding: 12px 24px; text-align: center;
  font-size: 13px; font-weight: 500; letter-spacing: 0.2px;
  border-bottom: 3px solid #7f1d1d;
}
.security-banner strong { font-weight: 700; }
.layout { display: grid; grid-template-columns: 280px 1fr; min-height: calc(100vh - 44px); }
aside.sidebar {
  background: #1a2332; color: #c7d0dc; padding: 24px 20px;
  overflow-y: auto; position: sticky; top: 0; height: 100vh;
}
.sidebar h1 { font-size: 15px; color: #fff; margin: 0 0 4px; }
.sidebar .subtitle { font-size: 11px; color: #7a8899; margin-bottom: 24px; }
.sidebar nav h3 {
  font-size: 11px; text-transform: uppercase; letter-spacing: 1px;
  color: #7a8899; margin: 24px 0 8px; font-weight: 600;
}
.sidebar nav a {
  display: block; padding: 6px 10px; color: #c7d0dc;
  text-decoration: none; border-radius: 6px; font-size: 13px;
  transition: background 0.15s;
}
.sidebar nav a:hover { background: #2a3648; color: #fff; }
.sidebar nav .count { color: #7a8899; font-size: 11px; margin-inline-start: 6px; }
main.content { padding: 32px 40px; max-width: 1200px; }
section {
  background: #fff; border-radius: 10px; padding: 24px 28px;
  margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.04);
}
section h2 {
  font-size: 20px; margin: 0 0 16px; padding-bottom: 12px;
  border-bottom: 2px solid #eef1f5; color: #1a2332;
}
section h3 { font-size: 15px; margin: 20px 0 10px; color: #2a3648; }
.info-grid {
  display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 12px; margin: 12px 0;
}
.info-item {
  padding: 12px 14px; background: #f8fafc; border-radius: 8px;
  border-inline-start: 3px solid #3b82f6;
}
.info-item.secret { border-inline-start-color: #dc2626; background: #fef2f2; }
.info-item .label { font-size: 11px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
.info-item .value {
  font-size: 14px; color: #1a2332; font-weight: 600; margin-top: 3px;
  word-break: break-all; font-family: "SF Mono", "Consolas", monospace;
}
.info-item.secret .value { color: #991b1b; }
table { width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 13px; }
th, td { padding: 9px 12px; text-align: start; border-bottom: 1px solid #eef1f5; }
thead th {
  background: #1a2332; color: #fff; font-weight: 600;
  font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;
  position: sticky; top: 0;
}
tbody tr:nth-child(even) { background: #f8fafc; }
tbody tr:hover { background: #eff6ff; }
tbody tr.secret-row { background: #fef2f2 !important; }
tbody tr.secret-row:hover { background: #fecaca !important; }
td.code { font-family: "SF Mono", "Consolas", monospace; font-size: 12px; color: #0369a1; }
td.secret-value { color: #991b1b; font-weight: 600; }
.file-block { margin: 14px 0; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; }
.file-header {
  background: #f8fafc; padding: 10px 14px; display: flex; align-items: center;
  justify-content: space-between; cursor: pointer; user-select: none;
  border-bottom: 1px solid #e2e8f0;
}
.file-header:hover { background: #eff6ff; }
.file-path {
  font-family: "SF Mono", "Consolas", monospace; font-size: 13px;
  color: #1a2332; font-weight: 600;
}
.file-meta { font-size: 11px; color: #64748b; display: flex; gap: 12px; align-items: center; }
.copy-btn {
  background: #3b82f6; color: #fff; border: 0; padding: 5px 12px;
  border-radius: 5px; cursor: pointer; font-size: 11px; font-weight: 600;
}
.copy-btn:hover { background: #2563eb; }
.copy-btn.copied { background: #16a34a; }
pre {
  margin: 0; padding: 16px; background: #0f172a; color: #e2e8f0;
  overflow-x: auto; font-family: "SF Mono", "Consolas", monospace;
  font-size: 12px; line-height: 1.55; direction: ltr; text-align: left;
}
code { background: #eef1f5; padding: 2px 5px; border-radius: 3px; font-size: 12px; }
.file-body { display: none; }
.file-block.open .file-body { display: block; }
.badge {
  display: inline-block; padding: 2px 8px; border-radius: 12px;
  font-size: 10px; font-weight: 600; text-transform: uppercase;
  letter-spacing: 0.5px; margin-inline-start: 4px;
}
.badge-php { background: #dbeafe; color: #1e40af; }
.badge-js { background: #fef3c7; color: #92400e; }
.badge-vue { background: #d1fae5; color: #065f46; }
.badge-css { background: #fce7f3; color: #9d174d; }
.badge-json { background: #e0e7ff; color: #3730a3; }
.badge-blade { background: #fed7aa; color: #9a3412; }
.badge-md { background: #f3e8ff; color: #6b21a8; }
.badge-yaml { background: #ccfbf1; color: #115e59; }
.badge-env { background: #fee2e2; color: #991b1b; }
.method-GET     { color: #16a34a; font-weight: 700; }
.method-POST    { color: #2563eb; font-weight: 700; }
.method-PUT     { color: #d97706; font-weight: 700; }
.method-PATCH   { color: #ca8a04; font-weight: 700; }
.method-DELETE  { color: #dc2626; font-weight: 700; }
.method-ANY     { color: #7c3aed; font-weight: 700; }
.empty { padding: 20px; text-align: center; color: #94a3b8; font-style: italic; background: #f8fafc; border-radius: 8px; }
.error-box { padding: 14px; background: #fef2f2; border-inline-start: 4px solid #dc2626; border-radius: 6px; color: #991b1b; margin: 10px 0; }
.hint { padding: 12px 16px; background: #eff6ff; border-inline-start: 3px solid #3b82f6; border-radius: 6px; color: #1e40af; font-size: 13px; margin: 12px 0; }
.warning-box { padding: 14px; background: #fef3c7; border-inline-start: 4px solid #d97706; border-radius: 6px; color: #92400e; margin: 12px 0; font-size: 13px; }
details { margin: 10px 0; }
details summary { cursor: pointer; padding: 8px 12px; background: #f8fafc; border-radius: 6px; font-weight: 600; }
details[open] summary { margin-bottom: 8px; }
.actions {
  position: fixed; bottom: 20px; inset-inline-end: 20px; display: flex; gap: 8px; z-index: 100;
}
.actions button {
  background: #1a2332; color: #fff; border: 0; padding: 10px 18px;
  border-radius: 8px; cursor: pointer; font-size: 13px; font-weight: 600;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.actions button:hover { background: #2a3648; }
@media (max-width: 900px) {
  .layout { grid-template-columns: 1fr; }
  aside.sidebar { position: relative; height: auto; }
  main.content { padding: 20px; }
}
CSS;
    }

    private function renderSidebar(array $files, array $stats): string
    {
        $links = [
            '#meta'      => '📊 معلومات المشروع',
            '#composer'  => '📦 حزم Composer',
            '#npm'       => '🎨 حزم npm',
            '#env'       => '⚙️ متغيرات البيئة',
            '#database'  => '🗄️ قاعدة البيانات',
            '#routes'    => '🛣️ Routes',
            '#files'     => '📁 كود المشروع',
        ];
        $out = "<aside class=\"sidebar\">\n"
            . "<h1>AI Context Report</h1>\n"
            . "<div class=\"subtitle\">Laravel Project Analyzer v2.0</div>\n"
            . "<nav>\n<h3>الأقسام</h3>\n";
        foreach ($links as $href => $label) {
            $out .= "<a href=\"$href\">$label</a>\n";
        }
        $out .= "<h3>المجلدات</h3>\n";
        foreach ($files as $folder => $items) {
            $slug = 'folder-' . md5($folder);
            $out .= sprintf(
                "<a href=\"#%s\">%s <span class=\"count\">(%d)</span></a>\n",
                $slug, htmlspecialchars($folder, ENT_QUOTES), count($items)
            );
        }
        $out .= "</nav>\n</aside>\n";
        return $out;
    }

    private function renderMetaSection(array $meta, array $stats): string
    {
        $items = [
            'المسار'          => $meta['project_path'],
            'إصدار Laravel'   => $meta['laravel_version'],
            'إصدار PHP'       => $meta['php_version'],
            'نظام التشغيل'    => $meta['os'],
            'تاريخ التوليد'   => $meta['generated_at'],
            'إجمالي الملفات'   => number_format($stats['total_files']),
            'إجمالي السطور'    => number_format($stats['total_lines']),
            'إجمالي الحجم'     => SafeReader::formatBytes($stats['total_bytes']),
        ];
        $grid = '';
        foreach ($items as $label => $value) {
            $grid .= "<div class=\"info-item\">"
                . "<div class=\"label\">" . htmlspecialchars($label, ENT_QUOTES) . "</div>"
                . "<div class=\"value\">" . htmlspecialchars((string) $value, ENT_QUOTES) . "</div>"
                . "</div>\n";
        }
        $laravelStats = '';
        foreach ($stats['laravel'] as $key => $count) {
            if ($count > 0) {
                $laravelStats .= "<div class=\"info-item\">"
                    . "<div class=\"label\">" . ucfirst($key) . "</div>"
                    . "<div class=\"value\">" . number_format($count) . "</div>"
                    . "</div>\n";
            }
        }
        $extRows = '';
        foreach ($stats['by_extension'] as $ext => $c) {
            $extRows .= "<tr><td class=\"code\">.$ext</td><td>" . number_format($c) . "</td></tr>\n";
        }
        return "<section id=\"meta\">\n<h2>📊 معلومات المشروع</h2>\n"
            . "<div class=\"info-grid\">$grid</div>\n"
            . ($laravelStats ? "<h3>إحصاءات Laravel</h3>\n<div class=\"info-grid\">$laravelStats</div>\n" : '')
            . ($extRows ? "<h3>توزيع الملفات حسب النوع</h3>\n"
                . "<table><thead><tr><th>الامتداد</th><th>العدد</th></tr></thead>"
                . "<tbody>$extRows</tbody></table>\n" : '')
            . "</section>\n";
    }

    private function renderComposerSection(array $c): string
    {
        return "<section id=\"composer\">\n<h2>📦 حزم Composer</h2>\n"
            . ($c['project_name'] ? "<div class=\"hint\">المشروع: <code>" . htmlspecialchars($c['project_name'], ENT_QUOTES) . "</code></div>" : '')
            . "<h3>حزم الإنتاج (require)</h3>\n" . $this->packageTable($c['production'])
            . "<h3>حزم التطوير (require-dev)</h3>\n" . $this->packageTable($c['development'])
            . "</section>\n";
    }

    private function packageTable(array $packages): string
    {
        if (empty($packages)) {
            return "<div class=\"empty\">لا توجد حزم</div>";
        }
        $rows = '';
        foreach ($packages as $name => $info) {
            $rows .= '<tr>'
                . '<td class="code">' . htmlspecialchars($name, ENT_QUOTES) . '</td>'
                . '<td class="code">' . htmlspecialchars($info['constraint'], ENT_QUOTES) . '</td>'
                . '<td class="code">' . htmlspecialchars($info['installed'], ENT_QUOTES) . '</td>'
                . '<td>' . htmlspecialchars($info['description'] ?? '—', ENT_QUOTES) . '</td>'
                . "</tr>\n";
        }
        return "<table><thead><tr><th>الاسم</th><th>القيد</th><th>المثبَّت</th><th>الوصف</th></tr></thead><tbody>$rows</tbody></table>";
    }

    private function renderNpmSection(array $npm): string
    {
        return "<section id=\"npm\">\n<h2>🎨 حزم npm / Frontend</h2>\n"
            . "<h3>الاعتماديات</h3>\n" . $this->npmTable($npm['production'])
            . "<h3>اعتماديات التطوير</h3>\n" . $this->npmTable($npm['development'])
            . "</section>\n";
    }

    private function npmTable(array $packages): string
    {
        if (empty($packages)) {
            return "<div class=\"empty\">لا توجد</div>";
        }
        $rows = '';
        foreach ($packages as $name => $info) {
            $rows .= '<tr>'
                . '<td class="code">' . htmlspecialchars($name, ENT_QUOTES) . '</td>'
                . '<td class="code">' . htmlspecialchars($info['constraint'], ENT_QUOTES) . '</td>'
                . '<td class="code">' . htmlspecialchars((string) $info['installed'], ENT_QUOTES) . '</td>'
                . "</tr>\n";
        }
        return "<table><thead><tr><th>الاسم</th><th>القيد</th><th>المثبَّت</th></tr></thead><tbody>$rows</tbody></table>";
    }

    /**
     * قسم .env — يعرض كل شيء بلا حجب (حسب طلب المستخدم)
     * لكن المفاتيح الحساسة تُلوَّن بالأحمر للتنبيه البصري
     */
    private function renderEnvSection(array $env): string
    {
        if (!$env['exists']) {
            return "<section id=\"env\">\n<h2>⚙️ متغيرات البيئة</h2>\n"
                . "<div class=\"empty\">ملف .env غير موجود</div></section>\n";
        }
        $rows = '';
        foreach ($env['values'] as $key => $val) {
            $isSecret = $this->isSecretKey($key);
            $rowClass = $isSecret ? ' class="secret-row"' : '';
            $valClass = $isSecret ? 'code secret-value' : 'code';
            $rows .= "<tr$rowClass>"
                . '<td class="code">' . htmlspecialchars($key, ENT_QUOTES) . '</td>'
                . '<td class="' . $valClass . '">' . htmlspecialchars((string) $val, ENT_QUOTES) . '</td>'
                . "</tr>\n";
        }
        return "<section id=\"env\">\n<h2>⚙️ متغيرات البيئة (كاملة)</h2>\n"
            . "<div class=\"warning-box\">🔴 المفاتيح الحساسة (كلمات مرور، مفاتيح API...) مُلوَّنة بالأحمر — احذر مشاركة هذا التقرير.</div>\n"
            . "<table><thead><tr><th>المفتاح</th><th>القيمة</th></tr></thead><tbody>$rows</tbody></table>\n"
            . "</section>\n";
    }

    private function isSecretKey(string $key): bool
    {
        $u = strtoupper($key);
        foreach (['PASSWORD', 'SECRET', 'TOKEN', 'KEY', 'PWD', 'DSN', 'PRIVATE', 'CREDENTIAL'] as $needle) {
            if (str_contains($u, $needle)) {
                // استثناء APP_KEY لأنه يحوي KEY لكن هو المفتاح ذاته
                return true;
            }
        }
        return false;
    }

    private function renderDatabaseSection(array $db): string
    {
        $out = "<section id=\"database\">\n<h2>🗄️ قاعدة البيانات</h2>\n";

        // بيانات الاتصال (تُعرض دائماً لو موجودة)
        if (isset($db['connection'])) {
            $out .= "<h3>🔗 بيانات الاتصال</h3>\n";
            $out .= "<div class=\"warning-box\">🔴 هذه بيانات اتصال حقيقية — تشمل كلمة مرور قاعدة البيانات.</div>\n";
            $out .= "<div class=\"info-grid\">\n";
            foreach ($db['connection'] as $label => $value) {
                if ($value === null || $value === '') continue;
                $isSecret = ($label === 'password');
                $itemClass = $isSecret ? 'info-item secret' : 'info-item';
                $out .= "<div class=\"$itemClass\">"
                    . "<div class=\"label\">" . htmlspecialchars($label, ENT_QUOTES) . "</div>"
                    . "<div class=\"value\">" . htmlspecialchars((string) $value, ENT_QUOTES) . "</div>"
                    . "</div>\n";
            }
            $out .= "</div>\n";
        }

        if (isset($db['error'])) {
            $out .= "<div class=\"error-box\">⚠ " . htmlspecialchars($db['error'], ENT_QUOTES) . "</div>\n</section>\n";
            return $out;
        }

        // ملخص
        $summary = [
            'إصدار الخادم' => $db['server_version'] ?? '—',
            'قاعدة البيانات' => $db['database'] ?? '—',
            'عدد الجداول'  => number_format($db['total_tables']),
        ];
        $grid = '';
        foreach ($summary as $l => $v) {
            $grid .= "<div class=\"info-item\"><div class=\"label\">"
                . htmlspecialchars($l, ENT_QUOTES) . "</div><div class=\"value\">"
                . htmlspecialchars((string) $v, ENT_QUOTES) . "</div></div>\n";
        }
        $out .= "<h3>ملخص الخادم</h3><div class=\"info-grid\">$grid</div>\n";

        // الجداول
        foreach ($db['tables'] ?? [] as $tableName => $info) {
            $countBadge = $info['row_count'] !== null
                ? ' <span class="badge badge-json">' . number_format($info['row_count']) . ' سطر</span>'
                : '';
            $out .= "<details><summary>🗂️ <code>" . htmlspecialchars($tableName, ENT_QUOTES) . "</code>$countBadge</summary>\n";
            $out .= $this->renderTableSchema($info);
            $out .= "</details>\n";
        }
        return $out . "</section>\n";
    }

    private function renderTableSchema(array $info): string
    {
        $out = "<h3>الأعمدة</h3>\n";
        if (!empty($info['columns'])) {
            $out .= "<table><thead><tr>";
            foreach (array_keys($info['columns'][0]) as $header) {
                $out .= "<th>" . htmlspecialchars($header, ENT_QUOTES) . "</th>";
            }
            $out .= "</tr></thead><tbody>";
            foreach ($info['columns'] as $col) {
                $out .= "<tr>";
                foreach ($col as $val) {
                    $out .= "<td class=\"code\">" . htmlspecialchars((string) ($val ?? '—'), ENT_QUOTES) . "</td>";
                }
                $out .= "</tr>";
            }
            $out .= "</tbody></table>";
        }
        if (!empty($info['indexes'])) {
            $out .= "<h3>الفهارس</h3>\n<table><thead><tr>";
            foreach (array_keys($info['indexes'][0]) as $h) {
                $out .= "<th>" . htmlspecialchars($h, ENT_QUOTES) . "</th>";
            }
            $out .= "</tr></thead><tbody>";
            foreach ($info['indexes'] as $idx) {
                $out .= "<tr>";
                foreach ($idx as $v) {
                    $out .= "<td class=\"code\">" . htmlspecialchars((string) ($v ?? '—'), ENT_QUOTES) . "</td>";
                }
                $out .= "</tr>";
            }
            $out .= "</tbody></table>";
        }
        if (!empty($info['foreign_keys'])) {
            $out .= "<h3>المفاتيح الخارجية</h3>\n<table><thead><tr>";
            foreach (array_keys($info['foreign_keys'][0]) as $h) {
                $out .= "<th>" . htmlspecialchars($h, ENT_QUOTES) . "</th>";
            }
            $out .= "</tr></thead><tbody>";
            foreach ($info['foreign_keys'] as $fk) {
                $out .= "<tr>";
                foreach ($fk as $v) {
                    $out .= "<td class=\"code\">" . htmlspecialchars((string) ($v ?? '—'), ENT_QUOTES) . "</td>";
                }
                $out .= "</tr>";
            }
            $out .= "</tbody></table>";
        }
        return $out;
    }

    private function renderRoutesSection(array $routes): string
    {
        if (empty($routes)) {
            return "<section id=\"routes\">\n<h2>🛣️ Routes</h2>\n<div class=\"empty\">لم تُكتشف routes</div></section>\n";
        }
        $out = "<section id=\"routes\">\n<h2>🛣️ Routes المكتشفة</h2>\n"
            . "<div class=\"hint\">تحليل نصي مبسّط لملفات routes/ — قد لا يظهر routes ديناميكية.</div>\n";
        foreach ($routes as $file => $entries) {
            $out .= "<h3>" . htmlspecialchars($file, ENT_QUOTES) . " (" . count($entries) . ")</h3>\n";
            $out .= "<table><thead><tr><th>Method</th><th>URI</th></tr></thead><tbody>";
            foreach ($entries as $r) {
                $out .= "<tr><td><span class=\"method-{$r['method']}\">" . $r['method'] . "</span></td>"
                    . "<td class=\"code\">" . htmlspecialchars($r['uri'], ENT_QUOTES) . "</td></tr>";
            }
            $out .= "</tbody></table>\n";
        }
        return $out . "</section>\n";
    }

    private function renderFilesSection(array $files): string
    {
        $out = "<section id=\"files\">\n<h2>📁 كود المشروع</h2>\n"
            . "<div class=\"hint\">هذه فقط الملفات التي أنشأتها أو عدَّلتها — بدون كود Laravel الأصلي.</div>\n";
        foreach ($files as $folder => $items) {
            $slug = 'folder-' . md5($folder);
            $out .= "<h3 id=\"$slug\">📂 " . htmlspecialchars($folder, ENT_QUOTES)
                . " <span style=\"color:#94a3b8;font-weight:normal\">(" . count($items) . " ملف)</span></h3>\n";
            foreach ($items as $file) {
                $badge = $this->langBadge($file['ext']);
                $safePath = htmlspecialchars($file['path'], ENT_QUOTES);
                $sizeStr  = SafeReader::formatBytes($file['size']);
                $linesStr = number_format($file['lines']) . ' سطر';
                $out .= "<div class=\"file-block\">\n"
                    . "<div class=\"file-header\" onclick=\"toggleFile(this)\">"
                    . "<div><span class=\"file-path\">$safePath</span>$badge</div>"
                    . "<div class=\"file-meta\">"
                    . "<span>$linesStr</span><span>$sizeStr</span>"
                    . "<button class=\"copy-btn\" onclick=\"event.stopPropagation();copyCode(this)\">نسخ</button>"
                    . "</div></div>\n"
                    . "<div class=\"file-body\"><pre><code class=\"lang-{$file['language']}\">"
                    . htmlspecialchars($file['content'], ENT_QUOTES)
                    . "</code></pre></div></div>\n";
            }
        }
        return $out . "</section>\n";
    }

    private function langBadge(string $ext): string
    {
        $badgeClass = match ($ext) {
            'php'                          => 'badge-php',
            'blade.php'                    => 'badge-blade',
            'js', 'ts', 'jsx', 'tsx', 'mjs' => 'badge-js',
            'vue'                          => 'badge-vue',
            'css', 'scss', 'sass'          => 'badge-css',
            'json'                         => 'badge-json',
            'md'                           => 'badge-md',
            'yml', 'yaml'                  => 'badge-yaml',
            'env'                          => 'badge-env',
            default                        => 'badge-json',
        };
        return "<span class=\"badge $badgeClass\">$ext</span>";
    }

    private function renderScripts(): string
    {
        return <<<'HTML'
<div class="actions">
  <button onclick="expandAll(true)">فتح الكل</button>
  <button onclick="expandAll(false)">إغلاق الكل</button>
  <button onclick="window.scrollTo({top:0,behavior:'smooth'})">↑ للأعلى</button>
</div>
<script>
function toggleFile(header) { header.parentElement.classList.toggle('open'); }
function expandAll(open) {
  document.querySelectorAll('.file-block').forEach(b => b.classList.toggle('open', open));
}
function copyCode(btn) {
  const code = btn.closest('.file-block').querySelector('pre code').innerText;
  navigator.clipboard.writeText(code).then(() => {
    btn.textContent = 'تم!';
    btn.classList.add('copied');
    setTimeout(() => { btn.textContent = 'نسخ'; btn.classList.remove('copied'); }, 1500);
  });
}
</script>
HTML;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【15】 MarkdownRenderer — تقرير Markdown نظيف لتغذية AI
// ═══════════════════════════════════════════════════════════════════════════
final class MarkdownRenderer
{
    public function render(array $data): string
    {
        $out  = $this->renderHeader($data['metadata']);
        $out .= $this->renderMetaSection($data['metadata'], $data['statistics']);
        $out .= $this->renderComposerSection($data['composer']);
        if ($data['npm']) {
            $out .= $this->renderNpmSection($data['npm']);
        }
        $out .= $this->renderEnvSection($data['env']);
        $out .= $this->renderDatabaseSection($data['database']);
        $out .= $this->renderRoutesSection($data['routes']);
        $out .= $this->renderFilesSection($data['files']);
        return $out;
    }

    private function renderHeader(array $meta): string
    {
        $projectPath = $meta['project_path'];
        $generatedAt = $meta['generated_at'];

        return <<<MD
# AI Context Report — Laravel Project

> ⚠️ **تحذير أمني**: هذا التقرير يحوي أسراراً حقيقية (`APP_KEY`, `DB_PASSWORD`, مفاتيح API).
> **لا ترفعه إلى Git ولا تشاركه علناً**. استخدمه لتغذية AI ثم احذفه.

**Project Path**: `$projectPath`
**Generated**: $generatedAt
**Generator**: ai_context_dump.php v2.0

---


MD;
    }

    private function renderMetaSection(array $meta, array $stats): string
    {
        $laravel = $meta['laravel_version'];
        $php     = $meta['php_version'];
        $os      = $meta['os'];
        $exts    = implode(', ', $meta['php_extensions']);

        $out = "## 📊 معلومات المشروع\n\n";
        $out .= "| المفتاح | القيمة |\n|---|---|\n";
        $out .= "| Laravel Version | `$laravel` |\n";
        $out .= "| PHP Version | `$php` |\n";
        $out .= "| OS | $os |\n";
        $out .= "| Total Files | " . number_format($stats['total_files']) . " |\n";
        $out .= "| Total Lines | " . number_format($stats['total_lines']) . " |\n";
        $out .= "| Total Size | " . SafeReader::formatBytes($stats['total_bytes']) . " |\n";
        $out .= "| PHP Extensions | $exts |\n\n";

        // إحصاءات Laravel
        $laravelStats = array_filter($stats['laravel']);
        if (!empty($laravelStats)) {
            $out .= "### إحصاءات Laravel\n\n";
            $out .= "| النوع | العدد |\n|---|---|\n";
            foreach ($laravelStats as $key => $count) {
                $out .= "| " . ucfirst($key) . " | " . number_format($count) . " |\n";
            }
            $out .= "\n";
        }

        // توزيع الامتدادات
        if (!empty($stats['by_extension'])) {
            $out .= "### توزيع الملفات حسب النوع\n\n";
            $out .= "| الامتداد | العدد |\n|---|---|\n";
            foreach ($stats['by_extension'] as $ext => $c) {
                $out .= "| `.$ext` | " . number_format($c) . " |\n";
            }
            $out .= "\n";
        }
        return $out . "---\n\n";
    }

    private function renderComposerSection(array $c): string
    {
        $out = "## 📦 حزم Composer\n\n";
        if ($c['project_name']) {
            $out .= "**المشروع**: `{$c['project_name']}`\n\n";
        }
        if ($c['php_constraint']) {
            $out .= "**PHP Constraint**: `{$c['php_constraint']}`\n\n";
        }
        $out .= "### حزم الإنتاج (require)\n\n";
        $out .= $this->packageTable($c['production']);
        $out .= "\n### حزم التطوير (require-dev)\n\n";
        $out .= $this->packageTable($c['development']);
        return $out . "\n---\n\n";
    }

    private function packageTable(array $packages): string
    {
        if (empty($packages)) {
            return "_(لا توجد)_\n";
        }
        $out = "| الاسم | القيد | المثبَّت | الوصف |\n|---|---|---|---|\n";
        foreach ($packages as $name => $info) {
            $desc = $info['description'] ? substr($info['description'], 0, 80) : '—';
            $desc = str_replace(['|', "\n"], [' ', ' '], $desc);
            $out .= "| `$name` | `{$info['constraint']}` | `{$info['installed']}` | $desc |\n";
        }
        return $out;
    }

    private function renderNpmSection(array $npm): string
    {
        $out = "## 🎨 حزم npm / Frontend\n\n";
        if ($npm['name']) {
            $out .= "**Package**: `{$npm['name']}` — Type: `{$npm['type']}`\n\n";
        }
        $out .= "### Dependencies\n\n" . $this->npmTable($npm['production']);
        $out .= "\n### devDependencies\n\n" . $this->npmTable($npm['development']);
        return $out . "\n---\n\n";
    }

    private function npmTable(array $packages): string
    {
        if (empty($packages)) {
            return "_(لا توجد)_\n";
        }
        $out = "| الاسم | القيد | المثبَّت |\n|---|---|---|\n";
        foreach ($packages as $name => $info) {
            $out .= "| `$name` | `{$info['constraint']}` | `{$info['installed']}` |\n";
        }
        return $out;
    }

    /**
     * .env كامل — بدون حجب (حسب طلب المستخدم)
     */
    private function renderEnvSection(array $env): string
    {
        $out = "## ⚙️ متغيرات البيئة (.env كاملاً)\n\n";
        if (!$env['exists']) {
            return $out . "_(ملف .env غير موجود)_\n\n---\n\n";
        }
        $out .= "> ⚠️ يحوي هذا القسم أسراراً حقيقية.\n\n";
        $out .= "```env\n";
        foreach ($env['values'] as $key => $val) {
            $out .= "$key=$val\n";
        }
        $out .= "```\n\n";
        return $out . "---\n\n";
    }

    private function renderDatabaseSection(array $db): string
    {
        $out = "## 🗄️ قاعدة البيانات\n\n";

        // بيانات الاتصال — بدون حجب
        if (isset($db['connection'])) {
            $out .= "### 🔗 بيانات الاتصال\n\n";
            $out .= "> ⚠️ بيانات اتصال حقيقية بما فيها كلمة المرور.\n\n";
            $out .= "| المفتاح | القيمة |\n|---|---|\n";
            foreach ($db['connection'] as $label => $value) {
                if ($value === null || $value === '') continue;
                $safe = str_replace(['|', "\n"], [' ', ' '], (string) $value);
                $out .= "| $label | `$safe` |\n";
            }
            $out .= "\n";
        }

        if (isset($db['error'])) {
            $out .= "> ⚠ **خطأ**: " . $db['error'] . "\n\n---\n\n";
            return $out;
        }

        // ملخص
        if (isset($db['server_version'])) {
            $out .= "### الملخص\n\n";
            $out .= "- **Driver**: `{$db['driver']}`\n";
            $out .= "- **Server Version**: `{$db['server_version']}`\n";
            if (isset($db['database'])) $out .= "- **Database**: `{$db['database']}`\n";
            $out .= "- **Total Tables**: {$db['total_tables']}\n\n";
        }

        // الجداول
        foreach ($db['tables'] ?? [] as $tableName => $info) {
            $rowCount = $info['row_count'] !== null ? " ({$info['row_count']} rows)" : '';
            $out .= "### 🗂️ Table: `$tableName`$rowCount\n\n";
            $out .= "#### Columns\n\n";
            if (!empty($info['columns'])) {
                $headers = array_keys($info['columns'][0]);
                $out .= "| " . implode(' | ', $headers) . " |\n";
                $out .= "|" . str_repeat('---|', count($headers)) . "\n";
                foreach ($info['columns'] as $col) {
                    $cells = array_map(fn($v) => '`' . str_replace(['|', "\n"], [' ', ' '], (string) ($v ?? '—')) . '`', $col);
                    $out .= "| " . implode(' | ', $cells) . " |\n";
                }
                $out .= "\n";
            }
            if (!empty($info['indexes'])) {
                $out .= "#### Indexes\n\n";
                $headers = array_keys($info['indexes'][0]);
                $out .= "| " . implode(' | ', $headers) . " |\n";
                $out .= "|" . str_repeat('---|', count($headers)) . "\n";
                foreach ($info['indexes'] as $idx) {
                    $cells = array_map(fn($v) => '`' . str_replace(['|', "\n"], [' ', ' '], (string) ($v ?? '—')) . '`', $idx);
                    $out .= "| " . implode(' | ', $cells) . " |\n";
                }
                $out .= "\n";
            }
            if (!empty($info['foreign_keys'])) {
                $out .= "#### Foreign Keys\n\n";
                $headers = array_keys($info['foreign_keys'][0]);
                $out .= "| " . implode(' | ', $headers) . " |\n";
                $out .= "|" . str_repeat('---|', count($headers)) . "\n";
                foreach ($info['foreign_keys'] as $fk) {
                    $cells = array_map(fn($v) => '`' . str_replace(['|', "\n"], [' ', ' '], (string) ($v ?? '—')) . '`', $fk);
                    $out .= "| " . implode(' | ', $cells) . " |\n";
                }
                $out .= "\n";
            }
        }
        return $out . "---\n\n";
    }

    private function renderRoutesSection(array $routes): string
    {
        $out = "## 🛣️ Routes\n\n";
        if (empty($routes)) {
            return $out . "_(لم تُكتشف routes)_\n\n---\n\n";
        }
        foreach ($routes as $file => $entries) {
            $out .= "### $file\n\n";
            $out .= "| Method | URI |\n|---|---|\n";
            foreach ($entries as $r) {
                $out .= "| `{$r['method']}` | `{$r['uri']}` |\n";
            }
            $out .= "\n";
        }
        return $out . "---\n\n";
    }

    private function renderFilesSection(array $files): string
    {
        $out = "## 📁 كود المشروع\n\n";
        $out .= "> فقط الملفات التي أنشأها أو عدَّلها المطوّر — بدون كود Laravel الأصلي.\n\n";

        foreach ($files as $folder => $items) {
            $count = count($items);
            $out .= "### 📂 `$folder` ($count files)\n\n";
            foreach ($items as $file) {
                $size = SafeReader::formatBytes($file['size']);
                $lines = number_format($file['lines']);
                $lang = $file['language'];
                $out .= "#### `{$file['path']}` — $lines lines, $size\n\n";
                $out .= "```$lang\n";
                $out .= rtrim($file['content'], "\n") . "\n";
                $out .= "```\n\n";
            }
        }
        return $out;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【16】 WelcomePage — الواجهة الترحيبية في المتصفح
// ═══════════════════════════════════════════════════════════════════════════
final class WelcomePage
{
    public static function render(string $projectPath): string
    {
        $safePath = htmlspecialchars($projectPath, ENT_QUOTES);
        return <<<HTML
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow,noarchive">
<title>AI Context Dump — Laravel Analyzer</title>
<style>
*, *::before, *::after { box-sizing: border-box; }
body {
  margin: 0; font-family: -apple-system, "Segoe UI", "Cairo", sans-serif;
  background: linear-gradient(135deg, #1a2332 0%, #0f172a 100%);
  color: #e2e8f0; min-height: 100vh; display: flex;
  align-items: center; justify-content: center; padding: 20px;
}
.box {
  background: #1e293b; border-radius: 16px; padding: 40px;
  max-width: 700px; width: 100%; box-shadow: 0 20px 60px rgba(0,0,0,0.4);
  border: 1px solid #334155;
}
h1 { margin: 0 0 8px; color: #fff; font-size: 24px; }
.subtitle { color: #94a3b8; margin-bottom: 24px; font-size: 14px; }
.warn {
  background: linear-gradient(90deg, #7f1d1d 0%, #991b1b 100%);
  color: #fef2f2; padding: 16px 20px; border-radius: 10px;
  margin: 20px 0; border-inline-start: 4px solid #dc2626; font-size: 14px;
  line-height: 1.6;
}
.warn strong { color: #fff; }
.info {
  background: #0f172a; padding: 12px 16px; border-radius: 8px;
  margin: 12px 0; font-size: 13px; color: #cbd5e1;
}
.info code { background: #334155; padding: 2px 8px; border-radius: 4px; color: #fbbf24; }
.actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 24px; }
.actions a {
  flex: 1; min-width: 180px; padding: 14px 20px; border-radius: 10px;
  text-decoration: none; text-align: center; font-weight: 600; font-size: 14px;
  transition: transform 0.15s, box-shadow 0.15s;
}
.actions a:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.3); }
.btn-html { background: #3b82f6; color: #fff; }
.btn-md   { background: #16a34a; color: #fff; }
.btn-html-dl { background: #1e40af; color: #fff; }
.btn-md-dl   { background: #14532d; color: #fff; }
ul { padding-inline-start: 20px; margin: 12px 0; }
li { margin: 6px 0; color: #cbd5e1; font-size: 13px; }
.footer { color: #64748b; font-size: 11px; text-align: center; margin-top: 24px; }
</style>
</head>
<body>
<div class="box">
  <h1>🔍 AI Context Dump v2.0</h1>
  <div class="subtitle">Laravel Project Analyzer — يجمع كل شيء في تقرير واحد</div>

  <div class="info">
    <strong>📂 مسار المشروع الحالي:</strong><br>
    <code>$safePath</code>
  </div>

  <div class="warn">
    <strong>⚠️ تحذير أمني قبل التوليد:</strong><br>
    التقارير المولَّدة ستحوي <strong>أسراراً حقيقية</strong>:
    <ul>
      <li>محتوى ملف <code>.env</code> كاملاً (APP_KEY، كلمات مرور، مفاتيح API)</li>
      <li>بيانات اتصال قاعدة البيانات (host, user, <strong>password</strong>)</li>
    </ul>
    <strong>افعل بعد التوليد:</strong>
    <ul>
      <li>أضف الملفات المولَّدة إلى <code>.gitignore</code></li>
      <li>احذف الملفات بعد إرسالها للـ AI</li>
      <li>لا تشارك التقرير مع أحد خارج نطاق ثقتك</li>
    </ul>
  </div>

  <p style="font-size:13px;color:#94a3b8">اختر نوع التقرير الذي تريده:</p>

  <div class="actions">
    <a class="btn-html" href="?action=generate&format=html">🖥️ عرض HTML</a>
    <a class="btn-md" href="?action=generate&format=md">📝 عرض Markdown</a>
    <a class="btn-html-dl" href="?action=generate&format=html&download=1">⬇ تحميل HTML</a>
    <a class="btn-md-dl" href="?action=generate&format=md&download=1">⬇ تحميل Markdown</a>
  </div>

  <div class="footer">
    الوصول: <code>localhost</code> فقط • CLI: <code>php ai_context_dump.php</code>
  </div>
</div>
</body>
</html>
HTML;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【17】 Application — يدعم CLI و Browser
// ═══════════════════════════════════════════════════════════════════════════
final class Application
{
    private string $htmlOutputFile = 'ai_context_report.html';
    private string $mdOutputFile   = 'ai_context_report.md';
    private bool   $skipDb         = false;
    private string $root;

    public function __construct(
        private readonly Logger $log,
        private readonly bool $isCli,
    ) {
        // في وضع CLI نستخدم مجلد العمل الحالي
        // في وضع Browser نستخدم مجلد السكربت نفسه
        $this->root = $this->isCli
            ? (getcwd() ?: __DIR__)
            : __DIR__;
    }

    public function run(array $argv): int
    {
        if ($this->isCli) {
            $this->parseArgs($argv);
            return $this->runCli();
        }
        return $this->runBrowser();
    }

    // ═══════ CLI mode ═══════
    private function runCli(): int
    {
        $this->log->info("جذر المشروع: {$this->root}");
        $this->log->info("سيُنتج ملفان: HTML + Markdown");

        if (!is_file($this->root . '/artisan')) {
            $this->log->warn("لم يُعثر على ملف artisan — قد لا يكون مشروع Laravel");
        }

        $data = $this->collectData();

        $htmlPath = $this->root . '/' . $this->htmlOutputFile;
        $mdPath   = $this->root . '/' . $this->mdOutputFile;

        $this->log->info("توليد HTML...");
        $html = (new HtmlRenderer())->render($data);
        if (@file_put_contents($htmlPath, $html) === false) {
            $this->log->error("فشل كتابة: $htmlPath");
            return 1;
        }
        $this->log->ok("HTML: $htmlPath (" . SafeReader::formatBytes((int) filesize($htmlPath)) . ")");

        $this->log->info("توليد Markdown...");
        $md = (new MarkdownRenderer())->render($data);
        if (@file_put_contents($mdPath, $md) === false) {
            $this->log->error("فشل كتابة: $mdPath");
            return 1;
        }
        $this->log->ok("Markdown: $mdPath (" . SafeReader::formatBytes((int) filesize($mdPath)) . ")");

        // تذكير أمني
        $this->log->warn("═══════════════════════════════════════════════════");
        $this->log->warn("⚠  الملفات تحتوي على أسرار حقيقية.");
        $this->log->warn("⚠  أضف هذه الأسطر إلى .gitignore:");
        $this->log->warn("       ai_context_dump.php");
        $this->log->warn("       ai_context_report.html");
        $this->log->warn("       ai_context_report.md");
        $this->log->warn("⚠  احذف الملفات بعد إرسالها للـ AI.");
        $this->log->warn("═══════════════════════════════════════════════════");
        return 0;
    }

    // ═══════ Browser mode ═══════
    private function runBrowser(): int
    {
        // الحماية أولاً — لن نصل هنا إذا كان الطلب ليس من localhost
        $action   = $_GET['action']   ?? '';
        $format   = $_GET['format']   ?? 'html';
        $download = isset($_GET['download']);

        if ($action !== 'generate') {
            // صفحة الترحيب
            header('Content-Type: text/html; charset=utf-8');
            echo WelcomePage::render($this->root);
            return 0;
        }

        // جمع البيانات
        $data = $this->collectData();

        // إخراج حسب format
        if ($format === 'md') {
            $content = (new MarkdownRenderer())->render($data);
            if ($download) {
                header('Content-Type: text/markdown; charset=utf-8');
                header('Content-Disposition: attachment; filename="ai_context_report.md"');
            } else {
                header('Content-Type: text/plain; charset=utf-8');
            }
            echo $content;
        } else {
            $content = (new HtmlRenderer())->render($data);
            if ($download) {
                header('Content-Type: text/html; charset=utf-8');
                header('Content-Disposition: attachment; filename="ai_context_report.html"');
            } else {
                header('Content-Type: text/html; charset=utf-8');
            }
            echo $content;
        }
        return 0;
    }

    /** جمع كل البيانات — مشترك بين CLI و Browser */
    private function collectData(): array
    {
        $reader = new SafeReader($this->log);

        $this->log->info("جمع معلومات المشروع...");
        $metadata = (new ProjectMetadata($this->root, $reader))->collect();

        $this->log->info("تحليل composer...");
        $composer = (new ComposerAnalyzer($this->root, $reader))->analyze();
        $this->log->ok("Composer: " . count($composer['production']) . " إنتاج + "
            . count($composer['development']) . " تطوير");

        $this->log->info("تحليل npm...");
        $npm = (new NpmAnalyzer($this->root, $reader))->analyze();
        if ($npm !== null) {
            $this->log->ok("npm: " . count($npm['production']) . " deps + "
                . count($npm['development']) . " devDeps");
        }

        $this->log->info("تحليل .env (بلا حجب — حسب طلب المستخدم)...");
        $env = (new EnvAnalyzer($reader))->analyze($this->root . '/.env');
        if ($env['exists']) {
            $this->log->ok(".env: {$env['total_keys']} مفتاح");
        }

        $database = ['error' => 'تم تخطي (--no-db)'];
        if (!$this->skipDb) {
            $this->log->info("تحليل قاعدة البيانات...");
            $database = (new DatabaseAnalyzer($this->root, $this->log))->analyze();
            if (!isset($database['error'])) {
                $this->log->ok("DB: {$database['total_tables']} جدول");
            } else {
                $this->log->warn($database['error']);
            }
        }

        $this->log->info("مسح ملفات المشروع...");
        $files = (new FilesystemScanner($this->root, $reader, $this->log))->scan();
        $totalFiles = array_sum(array_map('count', $files));
        $this->log->ok("تم جمع $totalFiles ملف من " . count($files) . " مجلد");

        $stats  = (new CodeStatistics())->compute($files);
        $routes = (new RoutesSummary())->summarize($files);

        return [
            'metadata'   => $metadata,
            'composer'   => $composer,
            'npm'        => $npm,
            'env'        => $env,
            'database'   => $database,
            'files'      => $files,
            'statistics' => $stats,
            'routes'     => $routes,
        ];
    }

    private function parseArgs(array $argv): void
    {
        foreach (array_slice($argv, 1) as $arg) {
            if ($arg === '--help' || $arg === '-h') {
                $this->printHelp();
                exit(0);
            }
            if ($arg === '--no-db') { $this->skipDb = true; continue; }
            if (str_starts_with($arg, '--html='))  { $this->htmlOutputFile = substr($arg, 7); continue; }
            if (str_starts_with($arg, '--md='))    { $this->mdOutputFile   = substr($arg, 5); continue; }
        }
    }

    private function printHelp(): void
    {
        echo <<<HELP
AI Context Dump v2.0 — تحليل مشاريع Laravel

الوضعان:
  CLI:      php ai_context_dump.php
  Browser:  http://localhost/ai_context_dump.php

CLI Options:
  --html=file.html   اسم ملف HTML (افتراضي: ai_context_report.html)
  --md=file.md       اسم ملف Markdown (افتراضي: ai_context_report.md)
  --no-db            تخطي تحليل قاعدة البيانات
  --help, -h         عرض هذه المساعدة

⚠  الملفات المولَّدة تحوي أسراراً — لا ترفعها لـ Git.

HELP;
    }
}


// ═══════════════════════════════════════════════════════════════════════════
// 【18】 Bootstrap — نقطة الانطلاق
// ═══════════════════════════════════════════════════════════════════════════
try {
    // في وضع المتصفح: نطبّق حراسة localhost أولاً
    if (!$IS_CLI) {
        BrowserGuard::enforce();
    }

    $log = new Logger($IS_CLI);
    if ($IS_CLI) {
        $log->info("═══ AI Context Dump v2.0 — بدء التحليل ═══");
    }

    $app = new Application($log, $IS_CLI);
    exit($app->run($argv ?? []));

} catch (\Throwable $e) {
    $msg = "خطأ غير متوقع: " . $e->getMessage();
    if ($IS_CLI) {
        fwrite(STDERR, "\n\033[31m✗\033[0m $msg\n");
        fwrite(STDERR, $e->getTraceAsString() . "\n");
    } else {
        http_response_code(500);
        header('Content-Type: text/plain; charset=utf-8');
        echo "$msg\n\n" . $e->getTraceAsString();
    }
    exit(1);
}
