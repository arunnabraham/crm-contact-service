# CRM w/ Contact Service
An extensible Lead/Contact Manager for CRM application

This is a Laravel-based service for managing contacts in a CRM system.  
Contacts can be created from multiple sources (e.g., Leads, Accounts) and the system is designed to be extensible.

## Features
- Contact creation via service layer
- Sources implemented as pluggable services
- Extensible for future sources
- Fully tested with PHPUnit (unit + feature)

## Requirements
- PHP 8.1+
- Laravel 10+
- Composer

## Installation
1. Clone repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure DB
4. Run migrations:
   ```bash
   php artisan migrate



