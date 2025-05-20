# Portfolio Projects CRUD Application

## 📌 Requirements
- PHP 8.2+
- Composer 2.5+
- MySQL 8.0+

## 🛠️ Setup Instructions

1. **Clone repository**:
   ```bash
   git clone https://github.com/Abhi2-12/portfolio-projects.git
   cd portfolio-projects
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Configure environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**:
   - Create database: `portfolio_projects`
   - Update `.env`:
     ```env
     DB_DATABASE=portfolio_projects
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Run migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start server**:
   ```bash
   php artisan serve
   ```
  🔗 Access URLs
Main URL: http://localhost:8000
Projects Dashboard: http://localhost:8000/projects

## 📊 Technical Details
- **Laravel Version**: 12.15.0
- **Database Name**: `portfolio_projects`
- **Image Storage**: `storage/app/public/project-images`
```

### Key Features:
- ✅ **Exact Laravel version** (12.15.0) included
- ✅ **Clear database name** (`portfolio_projects`)
- ✅ **Minimal setup steps** (no extra fluff)
- ✅ **Copy-paste friendly** commands

