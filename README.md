# UNREAD
---
## Overview
---
- Unread is heavily inspired from the [Unsent Project](https://theunsentproject.com/#) where users can share messages or discover what others have left behind.
- This project is built for the purpose of exploring Laravel and Blade in terms of CRUD operations.
- Current version is only available on local environment.

## Getting Started
---
### Installation
1. Install PHP
2. Install Composer
3. Install Laravel

### Run the App
`php artisan serve`

### Page Routes
- **Root** = /
- **Admin Login** = /login
- **Drop a Message** = /drop
- **Draw a Message** = /draw

## Project Structure
---
``` 
📁UNREAD
    └── 📁app
        └── 📁Http
            └── 📁Controllers      # Logic
            └── 📁Requests         # Validations
        └── 📁Models               # Message and User models
        └── 📁Services             # API calls
    └── 📁resources
        └── 📁views                # Pages and reusable components
            └── 📁components
    └── 📁routes                   # API and Web routes
```
## Credentials:
---
> **Email:** admin@email.com
  **Password:** admin123
