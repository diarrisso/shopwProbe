# Shopware 6 Project with Custom Theme and FAQ System

This repository contains a Shopware 6 project with a custom theme plugin (MyShopProbeTheme) that includes a FAQ system.

## Project Overview

This is a Shopware 6.7.0.0 project with the following components:
- Shopware Core, Administration, Storefront, and Elasticsearch
- Custom theme plugin (MyShopProbeTheme)
- PayPal integration (SwagPayPal)

## Requirements

- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- Node.js and npm
- Web server (Apache or Nginx)

## Installation

1. Clone the repository:
   ```
   git clone git@github.com:diarrisso/shopwProbe.git
   cd shopw-probe
   ```

2. Install dependencies:
   ```
   composer install
   ```

3. Configure your environment:
   - Create a `.env` file based on the `.env.example` file
   - Configure your database connection

4. Install Shopware:
   ```
   bin/console system:install
   ```

5. Build the administration:
   ```
   bin/console administration:build
   ```

6. Build the storefront:
   ```
   bin/console theme:compile
   ```

## Custom Theme Plugin (MyShopProbeTheme)

The custom theme plugin includes the following features:

### FAQ System

The plugin provides a FAQ system with the following components:
- Custom entity for storing FAQ items (question, answer, active status)
- Custom CMS element for displaying FAQs in the storefront
- Administration interface for managing FAQs

### Usage

1. Install and activate the plugin:
   ```
   bin/console plugin:install MyShopProbeTheme
   bin/console plugin:activate MyShopProbeTheme
   ```

2. Clear the cache:
   ```
   bin/console cache:clear
   ```

3. Add the FAQ CMS element to your pages in the Administration interface:
   - Go to Content > Shopping Experiences
   - Edit a page or create a new one
   - Add the FAQ List element to your page

## Development

### Building the Administration

To build the administration during development, use:
```
bin/console administration:build
```

### Building the Storefront

To build the storefront during development, use:
```
bin/console theme:compile
```

### Watching for Changes

To watch for changes in the administration files:
```
./bin/build-administration.sh
```

To watch for changes in the storefront files:
```
./bin/watch-storefront.sh
```

