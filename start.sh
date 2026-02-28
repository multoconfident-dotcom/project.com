#!/bin/bash

echo "=== Starting Rumah Sakit Application ==="

# Parse MYSQL_URL if provided by Railway (format: mysql://user:pass@host:port/dbname)
if [ -n "$MYSQL_URL" ]; then
    echo "Parsing MYSQL_URL from Railway..."
    DB_USERNAME=$(echo $MYSQL_URL | sed 's/mysql:\/\/\([^:]*\):.*/\1/')
    DB_PASSWORD=$(echo $MYSQL_URL | sed 's/mysql:\/\/[^:]*:\([^@]*\)@.*/\1/')
    DB_HOST=$(echo $MYSQL_URL | sed 's/mysql:\/\/[^@]*@\([^:]*\):.*/\1/')
    DB_PORT=$(echo $MYSQL_URL | sed 's/mysql:\/\/[^@]*@[^:]*:\([^/]*\)\/.*/\1/')
    DB_DATABASE=$(echo $MYSQL_URL | sed 's/mysql:\/\/[^@]*@[^/]*\/\(.*\)/\1/')
    
    export DB_CONNECTION=mysql
    export DB_HOST=$DB_HOST
    export DB_PORT=$DB_PORT
    export DB_DATABASE=$DB_DATABASE
    export DB_USERNAME=$DB_USERNAME
    export DB_PASSWORD=$DB_PASSWORD
    echo "Database: $DB_DATABASE @ $DB_HOST:$DB_PORT"
fi

# Use Railway MySQL variables if DB_HOST not set
if [ -z "$DB_HOST" ] && [ -n "$MYSQLHOST" ]; then
    echo "Using Railway MYSQL variables..."
    export DB_CONNECTION=mysql
    export DB_HOST=$MYSQLHOST
    export DB_PORT=${MYSQLPORT:-3306}
    export DB_DATABASE=${MYSQLDATABASE:-rumah_sakit}
    export DB_USERNAME=${MYSQLUSER:-root}
    export DB_PASSWORD=${MYSQLPASSWORD:-}
    echo "Database: $DB_DATABASE @ $DB_HOST:$DB_PORT"
fi

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

# Clear all caches first
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Wait for database to be ready (max 60 seconds)
echo "Waiting for database connection..."
MAX_TRIES=30
TRIES=0
until php artisan migrate:status > /dev/null 2>&1; do
    TRIES=$((TRIES + 1))
    if [ $TRIES -ge $MAX_TRIES ]; then
        echo "Database connection timeout after ${MAX_TRIES} attempts. Trying to migrate anyway..."
        break
    fi
    echo "Attempt $TRIES/$MAX_TRIES: Database not ready, waiting 2 seconds..."
    sleep 2
done

# Run migrations
echo "Running database migrations..."
php artisan migrate --force

# Cache for production
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start the server
echo "Starting Laravel server on port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
