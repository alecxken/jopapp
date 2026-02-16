# Migration Instructions - Add Username and Phone Columns

## Issue
The user creation form requires `username` and `phone` columns that don't exist in the current database schema.

## Solution
A migration has been created to add these columns to the `users` table.

## How to Run the Migration

### On Your Server (via SSH):

```bash
# Navigate to your application directory
cd /var/www/jopapp

# Run the migration
php artisan migrate

# You should see output like:
# Migrating: 2026_02_16_044000_add_username_and_phone_to_users_table
# Migrated:  2026_02_16_044000_add_username_and_phone_to_users_table (XX.XXms)
```

### What the Migration Does:

1. **Adds `username` column** (nullable, after `name` column)
   - Will default to NULL for existing users
   - New users will have username set to their name

2. **Adds `phone` column** (nullable, after `email` column)
   - Optional field for user phone numbers

### After Migration:

Once the migration runs successfully, the user creation form will work properly with:
- Username field (automatically populated from name)
- Phone number field (optional)
- All existing functionality

## Rollback (if needed):

If you need to reverse the migration:

```bash
php artisan migrate:rollback --step=1
```

This will remove the `username` and `phone` columns.

## Code Updates:

The UserController has been updated to:
1. Check if the `username` column exists before trying to save it
2. Only save `phone` if provided
3. Work seamlessly whether migration has been run or not

## Verification:

After running the migration, verify the columns were added:

```bash
# Check the users table structure
php artisan tinker
>>> Schema::getColumnListing('users');
# Should include 'username' and 'phone'
```

Or via MySQL:

```sql
DESCRIBE users;
```

You should see:
- `username` varchar(255) NULL
- `phone` varchar(255) NULL

## Important Notes:

- The migration is **safe** - it won't affect existing users
- The columns are **nullable** - no data loss
- The UserController will work **before and after** the migration
- After migration, new users will have username populated automatically
- Existing users will have NULL username (can be updated via edit form)

## Troubleshooting:

### Error: "Migration already ran"
```bash
php artisan migrate:status
```
Check if the migration already completed.

### Error: "SQLSTATE[42S21]: Column already exists"
The columns already exist. No action needed.

### Error: "Access denied"
Ensure your database user has ALTER TABLE permissions.

---

**File**: `database/migrations/2026_02_16_044000_add_username_and_phone_to_users_table.php`
**Date**: February 16, 2026
