# C3D Phase 1 Task Report

## What was built

- Converted the project from a static concept into a Laravel 13 application using the TALL stack baseline: Tailwind, Alpine, Laravel, Livewire, and Filament.
- Kept the selected Precision Studio design direction for the public website.
- Built public pages for Home, Services, Print My File, Design & Print, Small Batch Printing, Shop, About, Contact, and Request a Quote.
- Added a quote request flow with validation, success page, and multiple private file uploads for STL, 3MF, STEP, STP, OBJ, JPG, PNG, and PDF files.
- Added database models and migrations for quote requests, quote request files, and shop products.
- Added Filament admin resources for quote requests and products, including status management, internal notes, filters, and authenticated file downloads.
- Added a Filament dashboard stats widget for new, reviewing, and accepted/completed quote requests.
- Seeded an admin user and MVP shop products, including the generic "Gaming Case Bookends" product direction.
- Added SEO metadata targeting local 3D printing terms for Chichester, West Sussex, Hampshire, prototype printing, custom printing, replacement plastic parts, and small batch printing.
- Added feature tests for homepage rendering, successful quote submission with upload, and quote validation failures.

## Files changed

- `app/Http/Controllers/PageController.php`
- `app/Http/Controllers/QuoteRequestController.php`
- `app/Models/Product.php`
- `app/Models/QuoteRequest.php`
- `app/Models/QuoteRequestFile.php`
- `app/Models/User.php`
- `app/Filament/Resources/**`
- `app/Filament/Widgets/QuoteRequestStats.php`
- `database/migrations/*quote*`
- `database/migrations/*products*`
- `database/seeders/DatabaseSeeder.php`
- `resources/views/layouts/site.blade.php`
- `resources/views/components/quote-form.blade.php`
- `resources/views/pages/*.blade.php`
- `resources/css/app.css`
- `resources/js/app.js`
- `routes/web.php`
- `tests/Feature/ExampleTest.php`
- `vite.config.js`
- `public/images/3d-printing-workshop-hero.png`

## Decisions and assumptions

- Interpreted "Bamboo P1S with AMC" as Bambu P1S with AMS, and used that wording in the site copy.
- Kept Phase 1 quote-first, with no checkout or fake payment flow.
- Stored uploaded customer files on the private local disk and exposed downloads only through an authenticated admin route.
- Focused the material messaging on PLA and multicolour PLA via AMS, while leaving PETG as a selectable preference from the original brief.
- Used Filament for admin because the brief explicitly preferred it for Laravel.
- Removed the default Laravel Bunny Fonts Vite integration so builds work without external font fetching.

## How to test locally

1. Install dependencies:
   ```bash
   composer install
   npm install
   ```

2. Prepare the app:
   ```bash
   cp .env.example .env
   php artisan key:generate
   php artisan migrate:fresh --seed
   npm run build
   ```

3. Run the app:
   ```bash
   php artisan serve
   ```

4. Visit:
   - Public site: `http://127.0.0.1:8000`
   - Quote form: `http://127.0.0.1:8000/request-a-quote`
   - Admin: `http://127.0.0.1:8000/admin`

5. Seeded local admin:
   - Email: `admin@chichester3dprinting.com`
   - Password: `password`

6. Run tests:
   ```bash
   php artisan test
   ```

## Verification run

- `php artisan migrate:fresh --seed` passed.
- `npm run build` passed.
- `php artisan test` passed: 4 tests, 16 assertions.
- `./vendor/bin/pint` ran and formatted PHP imports.
- `php artisan route:list` passed and showed public, quote, Livewire, and Filament routes.
- `php artisan filament:cache-components` passed.
- Browser check passed for homepage and quote page: hero image loaded, quote form exists, upload input exists, Bambu P1S copy is present, and no horizontal overflow was detected.

## What should come next

- Add real email notifications when quote requests are submitted.
- Add admin reply/quote templates.
- Add product images and product detail pages.
- Add spam protection to the quote form.
- Add a deployment checklist for hosting, storage backups, admin credentials, and mail configuration.
- Replace seed password before any public deployment.
