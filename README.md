# Toshokan (Biblioteca)

This project is a virtual library where you can become a member and
request to borrow physical books for associated libraries.

# The idea

You want to borrow a book, so instead of just going to a library to check
if it is avaialbe and if you can borrow it you use this website to make an
appoinment to when a book is avaialbe for borrowing.

On the homepage you will be able to see all the new added books, if you want
to search for a book you can go to `search` page where search by title and filter
you can filter books based on:

- Tags (e.g. fiction, science, math, etc.)
- Library

# Exploits Defence

Defended against:

- [ ] Form Spoofing
- [x] HTTP Request Spoofing
- [ ] XSS
- [x] SQL Injection

# User

The user should be able to:
- [x] Register for an account
- [x] Apply for a library pass
- [ ] Borrow books
- [ ] Return a book

# Admin

The admin of the library should:
- [ ] Accept / Deny the application of a user
- [x] Update book information
- [x] Add / Delete books
