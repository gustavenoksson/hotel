WHY NOT A GIF HERE? TO SET THE MODE.

# Island name

Some text about your lovely island

# Hotel name

Why not add some info about the hotel of your dreams?

# Instructions

If your project requires some installation or similar, please inform your user 'bout it. For instance, if you want a more decent indentation of your .php files, you could edit [.editorconfig]('/.editorconfig').

# Code review

1. index.php:5-16 - You can use require() to get the header from another file, will be of great use when you want to use the same code on multiple pages
2. booking.php:36 - Instead of using die we can save the error message in a $\_SESSION variable then redirect the user back to the index file and then present the $\_SESSION['error] there, making the use of the site a little more intuative
3. booking.php:14-16 - Functions can actually take database connections as arguments. Therefore we can connect to a database the first thing we do, in a autoload.php file for example, and then use it as a parameter in our application. `function isValidDate(PDO $db)`. Saving use from connectig to the database multiple times.
4. booking.php:44-48 - The code would be easier to read if we moved this statement out of the isValidDate() function, and it wasnt referencing functions that are not yet defined.
5. booking.php:136 - If we moved all functions to a functions.php file or alike, this would be the only thing we see in this file. While the function is doing all the steps needed, it is not very clear what is going on, because we are doing so much more than just validating the date.
6. calendar.php:20 - this function is already defined in booking.php once, also it is handling all rooms but a variable is named $bookedBudgetDates, which is a little missleading. Very nice function overall though.
7. calendar.php:5 - From what I can find this file is only included in the index.php file, where we call the vendor/autoload.php file already. We are currently running throught the autoload file twice with every load of index.php which will slow the application down.
8. receipt.php:5-20 - This didn't really need to be a function. Also because it is a function without arguments it is not clear where we get the variables from.
9. script.js - To make our projects more structured we can place our JS,CSS and images in a folder names Assets or something similar.
10. script.js:6-15 - Remember that variables defined inside a function using const are then scoped to that function, meaning we can not access them outside of it, `https://www.w3schools.com/js/js_scope.asp` this article explains it very well
