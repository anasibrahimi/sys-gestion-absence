# ISTA-ABS - Absence Management System
# نظام إدارة الغياب - ISTA-ABS

[English](#english) | [العربية](#arabic)

---

## English

### Overview
This app is a comprehensive absence management system built with Laravel framework. It provides educational institutions with tools to manage student attendance, track absences, generate reports, and maintain academic records efficiently.

### Features
- **User Authentication**: Secure login and registration system with session management
- **Student Management**: Add, edit, and delete student records
- **Class Management**: Organize students into classes and programs
- **Teacher Management**: Manage teacher information and assignments
- **Module Management**: Create and assign modules to classes
- **Session Management**: Schedule and manage class sessions
- **Absence Tracking**: Record and track student absences
- **PDF Reports**: Generate attendance reports in PDF format
- **Responsive Design**: Modern UI with Tailwind CSS

### Technology Stack
- **Backend**: Laravel 12.x (PHP 8.2+)
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL/PostgreSQL/SQLite
- **PDF Generation**: DomPDF
- **Authentication**: Laravel's built-in authentication

### Installation

#### Prerequisites
- PHP 8.2 or higher
- Composer
- Database (MySQL, PostgreSQL, or SQLite)

#### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd sys-gestion-absence
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   Edit `.env` file and set your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=system
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

### Usage

#### Registration & Login
- Access the application at `http://localhost:8000`
- **New Users**: Visit `/register` to create a new account
- **Existing Users**: Use `/login` to access the system
- Registration requires: Full name, email, and password (minimum 6 characters)

#### Dashboard
The main dashboard provides access to all system modules:
- **Students**: Manage student records
- **Classes**: Organize students into classes
- **Teachers**: Manage teacher information
- **Modules**: Create and assign academic modules
- **Sessions**: Schedule class sessions
- **Absences**: Record and track attendance

#### Recording Absences
1. Navigate to Absences → Add Absence
2. Select a class/group
3. Choose the session date and time
4. Mark students as present/absent
5. Save the attendance record

#### Generating Reports
- Access Sessions to view attendance records
- Use the PDF download feature to generate attendance reports
- Reports include student details, session information, and absence status

### Database Structure

#### Main Tables
- **users**: System users and authentication
- **filieres**: Academic programs/departments
- **classes**: Student groups
- **etudiants**: Student records
- **enseignants**: Teacher records
- **modules**: Academic modules
- **seances**: Class sessions
- **absences**: Attendance records

#### Relationships
- Students belong to Classes
- Classes belong to Programs (Filières)
- Modules are assigned to Classes
- Teachers are assigned to Modules
- Sessions are created for Modules
- Absences are recorded for Students in Sessions

### API Endpoints

#### Authentication
- `GET /login` - Login page
- `POST /login` - Login attempt
- `GET /register` - Registration page
- `POST /register` - Registration attempt
- `GET /logout` - Logout

#### Resources (Protected by auth middleware)
- `GET /` - Dashboard
- `GET /filieres` - List programs
- `GET /classes` - List classes
- `GET /etudiants` - List students
- `GET /enseignants` - List teachers
- `GET /modules` - List modules
- `GET /seances` - List sessions
- `GET /absences` - List absences
- `GET /seances/{id}/pdf` - Download session PDF

---

## العربية

### نظرة عامة
هذا التطبيق هو نظام شامل لإدارة الغياب مبني على إطار عمل Laravel. يوفر للمؤسسات التعليمية أدوات لإدارة حضور الطلاب، وتتبع الغياب، وإنشاء التقارير، والحفاظ على السجلات الأكاديمية بكفاءة.

### المميزات
- **المصادقة**: نظام تسجيل دخول وتسجيل مستخدمين آمن مع إدارة الجلسات
- **إدارة الطلاب**: إضافة وتعديل وحذف سجلات الطلاب
- **إدارة الفصول**: تنظيم الطلاب في فصول وبرامج
- **إدارة المعلمين**: إدارة معلومات المعلمين وتعييناتهم
- **إدارة الوحدات**: إنشاء وتعيين الوحدات الأكاديمية للفصول
- **إدارة الجلسات**: جدولة وإدارة جلسات الفصول
- **تتبع الغياب**: تسجيل وتتبع غياب الطلاب
- **تقارير PDF**: إنشاء تقارير الحضور بصيغة PDF
- **تصميم متجاوب**: واجهة مستخدم حديثة مع Tailwind CSS

### التقنيات المستخدمة
- **الخلفية**: Laravel 12.x (PHP 8.2+)
- **الواجهة الأمامية**: Blade Templates, Tailwind CSS
- **قاعدة البيانات**: MySQL/PostgreSQL/SQLite
- **إنشاء PDF**: DomPDF
- **المصادقة**: نظام المصادقة المدمج في Laravel

### التثبيت

#### المتطلبات الأساسية
- PHP 8.2 أو أحدث
- Composer
- قاعدة بيانات (MySQL, PostgreSQL, أو SQLite)

#### تعليمات الإعداد

1. **استنساخ المستودع**
   ```bash
   git clone <repository-url>
   cd sys-gestion-absence
   ```

2. **تثبيت تبعيات PHP**
   ```bash
   composer install
   ```

3. **إعداد البيئة**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **تكوين قاعدة البيانات**
   عدّل ملف `.env` وحدد بيانات قاعدة البيانات:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=system
   DB_USERNAME=اسم_المستخدم
   DB_PASSWORD=كلمة_المرور
   ```

5. **تشغيل الترحيلات**
   ```bash
   php artisan migrate
   ```

6. **تشغيل خادم التطوير**
   ```bash
   php artisan serve
   ```

### الاستخدام

#### التسجيل وتسجيل الدخول
- الوصول للتطبيق على `http://localhost:8000`
- **المستخدمون الجدد**: زر `/register` لإنشاء حساب جديد
- **المستخدمون الحاليون**: استخدم `/login` للوصول للنظام
- التسجيل يتطلب: الاسم الكامل، البريد الإلكتروني، وكلمة المرور (6 أحرف على الأقل)

#### لوحة التحكم
توفر لوحة التحكم الرئيسية الوصول لجميع وحدات النظام:
- **الطلاب**: إدارة سجلات الطلاب
- **الفصول**: تنظيم الطلاب في فصول
- **المعلمون**: إدارة معلومات المعلمين
- **الوحدات**: إنشاء وتعيين الوحدات الأكاديمية
- **الجلسات**: جدولة جلسات الفصول
- **الغياب**: تسجيل وتتبع الحضور

#### تسجيل الغياب
1. انتقل إلى الغياب → إضافة غياب
2. اختر فصل/مجموعة
3. اختر تاريخ ووقت الجلسة
4. حدد الطلاب كحاضرين/غائبين
5. احفظ سجل الحضور

#### إنشاء التقارير
- الوصول للجلسات لعرض سجلات الحضور
- استخدم ميزة تحميل PDF لإنشاء تقارير الحضور
- تتضمن التقارير تفاصيل الطلاب ومعلومات الجلسة وحالة الغياب

### هيكل قاعدة البيانات

#### الجداول الرئيسية
- **users**: مستخدمي النظام والمصادقة
- **filieres**: البرامج/الأقسام الأكاديمية
- **classes**: مجموعات الطلاب
- **etudiants**: سجلات الطلاب
- **enseignants**: سجلات المعلمين
- **modules**: الوحدات الأكاديمية
- **seances**: جلسات الفصول
- **absences**: سجلات الحضور

#### العلاقات
- الطلاب ينتمون للفصول
- الفصول تنتمي للبرامج (Filières)
- الوحدات تُخصص للفصول
- المعلمون يُخصصون للوحدات
- الجلسات تُنشأ للوحدات
- الغياب يُسجل للطلاب في الجلسات

### نقاط النهاية API

#### المصادقة
- `GET /login` - صفحة تسجيل الدخول
- `POST /login` - محاولة تسجيل الدخول
- `GET /register` - صفحة التسجيل
- `POST /register` - محاولة التسجيل
- `GET /logout` - تسجيل الخروج

#### الموارد (محمية بواسطة middleware المصادقة)
- `GET /` - لوحة التحكم
- `GET /filieres` - قائمة البرامج
- `GET /classes` - قائمة الفصول
- `GET /etudiants` - قائمة الطلاب
- `GET /enseignants` - قائمة المعلمين
- `GET /modules` - قائمة الوحدات
- `GET /seances` - قائمة الجلسات
- `GET /absences` - قائمة الغياب
- `GET /seances/{id}/pdf` - تحميل PDF الجلسة

