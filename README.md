# 🚀 AWS Infrastructure Monitoring Dashboard

A **Laravel-based infrastructure monitoring dashboard** inspired by **AWS CloudWatch**, designed to monitor and visualize server health metrics including CPU usage, memory consumption, disk utilization, uptime, service health, and historical performance trends.

---

## 📖 Overview

The **AWS Infrastructure Monitoring Dashboard** was developed to gain hands-on experience in:

* ☁️ Cloud Computing Concepts
* 📊 Infrastructure Monitoring
* 🖥️ System Administration
* 🏗️ Service-Oriented Architecture
* 📈 Data Visualization

The system simulates core monitoring capabilities commonly found in enterprise monitoring platforms such as **AWS CloudWatch**, **Datadog**, and **Grafana**.

---

## ✨ Features

### 📊 Infrastructure Monitoring

* ✅ Real-time CPU Monitoring
* ✅ Memory Utilization Tracking
* ✅ Disk Usage Monitoring
* ✅ Server Uptime Monitoring

### 🩺 Health Checks

* ✅ Application Status Monitoring
* ✅ Storage Availability Check
* ✅ Database Connectivity Check
* ✅ Cache Status Verification

### 💻 System Information

* ✅ Hostname Detection
* ✅ Operating System Information
* ✅ PHP Version Monitoring
* ✅ Laravel Version Monitoring
* ✅ Server Time Tracking

### 📈 Performance Analytics

* ✅ Historical Metrics Logging
* ✅ SQLite Data Storage
* ✅ Trend Visualization with Chart.js
* ✅ Metrics History Table

---

## 🛠️ Technology Stack

| Technology       | Purpose            |
| ---------------- | ------------------ |
| **Laravel 12**   | Backend Framework  |
| **PHP 8.2**      | Application Logic  |
| **SQLite**       | Data Storage       |
| **Tailwind CSS** | User Interface     |
| **Chart.js**     | Data Visualization |
| **Git & GitHub** | Version Control    |

---

## 🏗️ System Architecture

```text
┌──────────────┐
│    User      │
└──────┬───────┘
       │
       ▼
┌─────────────────────┐
│ Laravel Dashboard   │
└──────┬──────────────┘
       │
       ▼
┌─────────────────────┐
│ SystemMetricsService│
└──────┬──────────────┘
       │
 ┌─────┼─────┐
 ▼     ▼     ▼
CPU  Memory  Disk
       │
       ▼
┌─────────────────────┐
│ SQLite Database     │
└──────┬──────────────┘
       │
       ▼
┌─────────────────────┐
│ Chart.js Analytics  │
└─────────────────────┘
```

---

## 📸 Screenshots

### 🖥️ Dashboard Overview

![Dashboard Overview](screenshots/dashboard-overview.png)

### 📈 Performance Trends

![Performance Trends](screenshots/performance-trends.png)

### ⚙️ System Information

![System Information](screenshots/system-information.png)

---

## ⚡ Installation

### 1️⃣ Clone Repository

```bash
git clone https://github.com/your-username/aws-infrastructure-monitor.git
cd aws-infrastructure-monitor
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Run Database Migration

```bash
php artisan migrate
```

### 5️⃣ Start Development Server

```bash
php artisan serve
```

### 6️⃣ Compile Frontend Assets

```bash
npm run dev
```

---

## 🎯 Learning Objectives

This project was created to:

* 📚 Understand infrastructure monitoring concepts
* ☁️ Learn AWS-inspired architecture patterns
* 🔧 Practice Laravel service-based architecture
* 📊 Visualize monitoring data effectively
* 💾 Implement historical metric storage
* 🚀 Build a professional portfolio project

---

## 🔮 Future Improvements

* ⏱️ Automated metric collection using Laravel Scheduler
* 🔔 Email and Slack alert notifications
* 🖥️ Multi-server monitoring support
* 👥 User Authentication & Authorization
* 🐳 Docker Containerization
* ☁️ AWS EC2 Deployment
* 📡 AWS CloudWatch Integration
* 📈 Advanced Analytics Dashboard

---

## 💼 Resume Project Summary

> Developed an **AWS-inspired Infrastructure Monitoring Dashboard** using **Laravel**, **SQLite**, and **Chart.js** to monitor CPU, memory, disk utilization, uptime, and infrastructure health. Implemented historical metric logging, performance visualization, and monitoring concepts similar to enterprise cloud monitoring platforms such as AWS CloudWatch.

---

## 👨‍💻 Author

**Zahid Ashraf**

🔗 GitHub: https://github.com/zahidashraf

---

⭐ If you found this project useful, consider giving it a star.
