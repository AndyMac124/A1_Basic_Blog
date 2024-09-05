# COSC360 A3 - Laravel Sanctum API

### GitHub Repository: https://github.com/AndyMac124/A1_Basic_Blog/tree/sanctum-api

#### Author: Andrew McKenzie
#### Email: amcken33@myune.edu.au  
#### Student ID: 220263507

---

### Configuring and running from ZIP file
1. Unzip the provided folder and open in an editor of your choice.
2. Configure and add the .env file, there is an example in .env.example which can be copied and pasted.
3. Set up the database connection in the .env file or leave the version copied from .env.example.
4. Run `npm install`.
5. Run `composer install`.
6. I also recommend running `php artisan migrate` to confirm the migration.
7. Ensure you have MongoDB set up for the database.
8. Run `npm run dev`.
9. Run `php artisan serve`.

Recommended: run `php artisan db:seed` to create 2 Admins, 3 Authors, and 2 Users with 3 posts each.

**Routes for Admin and Authors:**
- Register Admin account: `<base_url>/admin/register`
- Register Author account: `<base_url>/author/register`
- Login: `<base_url>/login`
<br>*Note* I have left a single login route for all roles, once logged in they will have the ability to switch between any
role they have permission for such as 'view admin dashboard', 'view author dashboard', or 'leave dashboard' to view the 
standard front end

### Dashboard Usage Instructions

Once logged in, from the front end page an Author or Admin can select the dropdown in the top right hand corner
and select either "view author dashboard" and/or "view admin dashboard" depending on their role. From there 
both the Admin and Author have a similar dashboard with different options on the right hand side.

Blog posts and users contain a link within the title or users name which can be clicked on to view the post and buttons 
are displayed based on the options to act upon the displayed post or user. Selecting "Leave Dashboard" will take 
the user back to main frontend.

A list of Admin/Author right hand panel options are below, from within each option the buttons will appear for taking
further actions e.g. 'Back', 'Edit', 'Submit', 'Delete' etc.

**Admin Role:**
The main Admin dashboard provides an overview of the 10 most recent registrations and 10 most recent blog posts.
If logged in as an Admin they will also have the option to view "Author Dashboard" on the right hand panel.
Right hand panel options include:
- Dashboard: Displays to main Author Dashboard.
- View all Users: Displays all registered users.
- View all Posts: Displays all blog posts.
- Add New User: Create a new user.
- Create New Post: Create a new post for this user.
- Author Dashboard: Switch to Author Dashboard view.
- Leave Dashboard: Exit Dashboard and return to Frontend site.
- Logout: Logout from site.

**Author Role:**
If logged in with an author role they will only receive the options to view all posts (written by themselves) 
or modify their account details.
Right hand panel options include:
- Dashboard: Displays to main Author Dashboard.
- View all Posts: Displays all of this users blog posts.
- Create New Post: Create a new post for this user.
- Update Account: Modify this users account details.
- Admin Dashboard: **Only visible if user is Admin** Switch to Admin Dashboard view.
- Leave Dashboard: Exit Dashboard and return to Frontend site.
- Logout: Logout from site.

---

## Report

### Approach:
For the API I basically followed the lectures and modified what was needed for accessing posts.
It was a quick and simple process to add on to the existing code from Assignment 2, just creating an
API PostController with two functions and the required API routes.

### Challenges Faced:
I can't say I faced any challenges with the backend. The only hiccup I had was wondering why 
`index()` was returning an empty array, it turned out I hadn't seeded the database with any posts which
was borderline embarrassing but at least it was an easy fix.
