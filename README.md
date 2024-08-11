# COSC360 A2 - Blog with Admin Dashboard

### GitHub Repository: https://github.com/AndyMac124/A1_Basic_Blog/tree/feature/auth-admin-panel

#### Author: Andrew McKenzie
#### Email: amcken33@myune.edu.au  
#### Student ID: 220263507

---

### Configuring and running from ZIP file
1. Unzip the provided folder and open in an editor of your choice.
2. Configure and add the .env file, there is an example in .env.example.
3. Set up the database connection in the .env file.
4. Run `npm install`.
5. Run `composer install`.
6. I also recommend running `php artisan migrate` to confirm the migration.
7. Start your database and server of choice.
8. Run `npm run dev`.
9. Run `php artisan serve`.

Optional: run `php artisan db:seed` to create 2 Admins, 3 Authors, and 2 Users with 3 posts each.

**Routes for Admin and Authors:**
- Register Admin account: `<base_url>/admin/regiter`
- Register Author account: `<base_url>/author/regiter`
- Login: `<base_url>/login`
<br>*Note* I have left a single login route for all roles, once logged in they will have the ability to switch between any
role they have permission for such as 'view admin dashboard', 'view author dashboard', or 'leave dashboard' to view the 
standard front end

---

## Report

### Approach:
My approach was to create the dashboard from the bootstrap template and have the same dashboard view for Authors and Admins.
From the main frontend they can select to view Author and/or Admin dashboards from the right hand drop down (where logout is located).
Once inside the dashboard they can switch between author and admin dashboards (if permitted to do so) and they can also 'leave dashboard' to
return to the main frontend. I have left the dark/light modes active, and modified the colour palette. The main Dashboard 
shows the 10 most recent posts (and 10 most recent user registrations to Admins) with a range of options on the right hand column.

### Challenges Faced:
My main challenge was when trying to optimise the CSS and JS files I broke the light/dark mode button and ended up reverting
to a previous commit and starting again but with a lot more caution. Another challenge was after refactoring all the scripts in the 
dashboard template into the app.scss and app.js files I had performance reduction in the web page and had to work on making sure the
order of the links were correct to maintain performance.

### Bonus Marks:
Middleware has been created for admin access and applied to admin routes:

```php
    if (Auth::check() && Auth::user()->user_role == 'admin') {
        return $next($request);
    }
    abort(403);
```

```php
    Route::prefix('admin')->middleware(['auth'])->group(function() {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.dashboard')->middleware(AdminMiddleware::Class);
        Route::get('posts/view', [AdminPostController::class, 'viewPosts'])->name('admin.posts.listPosts')->middleware(AdminMiddleware::class);
        Route::get('posts/{post}/delete', [AdminPostController::class, 'confirmDelete'])->name('admin.posts.delete');
        Route::resource('posts', AdminPostController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
        Route::resource('users', AdminUserController::class, ['as' => 'admin'])->middleware(AdminMiddleware::Class);
    });
```
