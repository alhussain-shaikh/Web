`#php`  `#mvc`  `#master-in-software-engineering` `#sql` `#oop`
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-2-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

# Employee Management V2 <!-- omit in toc -->


<p>

<img  alt="Version"  src="https://img.shields.io/badge/version-2.0-blue.svg?cacheSeconds=2592000" />

</p>

  
>This project is part of the Master in Software Development. The objective was to create an a easy-to-use interface to manage employees information. The application user case starts with an user log in, and allows the user to read, create, delete and update the employee´s information. The user and employee data is stored in a database.

> This project objective is to create a file structure following the MVC pattern, with a basic router implementation and OOP approach.

   ### Main objectives:
● Connect your backend to your MySQL database
● Execute queries in your PHP code
● Adapt your code to work with classes and methods
● Improve your knowledge of MVC pattern
● Refactor the code of a existing project
   


## Index <!-- omit in toc -->
- [Where to start?🚀](#where-to-start)
  - [Install🔧](#install)
  - [Requirements📋](#requirements)
- [Deployment📦](#deployment)
- [How to use 💻](#how-to-use-)
  - [Dashboard page](#dashboard-page)
  - [Employee page](#employee-page)
- [Project structure 📁](#project-structure-)
- [Tools and tecnologies used 🛠️](#tools-and-tecnologies-used-️)
- [Project requirements 📏](#project-requirements-)
- [Based on](#based-on)
	-[Dashboard page](#dashboard-page) 
	-[Employee page](#dashboard-page) 
- [Where to start?🚀](#where-to-start)
  - [Install🔧](#install)
  - [Requirements📋](#requirements)
- [Deployment📦](#deployment)
- [How to use 💻](#how-to-use-)
  - [Dashboard page](#dashboard-page)
  - [Employee page](#employee-page)
- [Project structure 📁](#project-structure-)
- [Tools and tecnologies used 🛠️](#tools-and-tecnologies-used-️)
- [Project requirements 📏](#project-requirements-)
- [Based on](#based-on)
  
## Where to start?🚀
### Install🔧

To clone this repository you have run in terminal:

```sh
git clone https://github.com/mhfortuna/php-employee-management-v1.git
```
Then you need to copy this folder to `htdocs` or change the server root variable.
After that, run a `npm install` in the root of the project, for all dependencies to install.

### Requirements📋

To run this project you need yo have XAMPP installed in your PC (or MUMP in the case of Mac users). For more information about XAMPP visit [their website](https://www.apachefriends.org/es/index.html).

You need to have a database with all the employees and users in your mysql workspace. We provide you with all the required queries to create the database, its tables and insert mock data inside the **resources** folder.

Set your database configuration on the **config/db.php** file. (username, password, dbname etc.)


## Deployment📦

To open the file explorer just open a browser and go to [localhost](localhost)
You'll have to login, the credentials are:
```
email: admin@assemblerschool.com
pass: 123456
```
## How to use 💻

### Dashboard page
After you have logged in the application you'll see a grid with some of the employees data. From there you can add new employees or delete them. If you double click on an employee you can see more data in a new page called the **employee page**. If you press on the employee icon it will redirect you to the **employee page** too, but this time you'll have a form to create a new employee.

### Employee page
This page renders conditionaly of how you accesed it:
- Case 1 - double click on employee from dashboard:
In this view you will see the available employee data, and you can update any of the fields. It the `id` doesn't exist it will show an error and redirect you to the dashboard.
- Case 3 - Click on the employee icon from dashboard:
In this view you'll see the empty form to create a new employee. There are mandatory fields to fill. When you submit the new employee it will show a modal and redirect you to the dashboard.

## Project structure 📁

```
├───config // Here you can find the project constants
├───controllers // The intermediary beetwen the view and the model, which manages the user interactions with the view or HTTP requests, requests the data to the model and returns this data to the view
├───db
├───libs
│   └───classes
├───models // The classes and methods that interact with the database
├───public
│   └───assets
│       ├───css
│       ├───html
│       └───js
├───resources
├───src
│   └───library
└───views // What the user sees
    ├───dashboard
    ├───employee
    ├───error
    └───login
```

## Tools and tecnologies used 🛠️

* PHP
* HTML
* CSS
* JavaScript
* jQuery
* jsGrid
* Bootstrap 
* Visual Studio Code
* XAMPP - Open source cross-platform web server
* OOP

## Project requirements 📏

● You must use PDO to establish the connection with your database
● All code included comments need to be write in English
● Use a code style like camelCase
● HTML never use inline styles
● It is recommended to divide the tasks into several subtasks so that you can associate each particular step of the construction with a specific commitment.
● You should try as much as possible that the commits and planned tasks are the same
● You must create a correctly documented README.md file in the root directory of the project (see guidelines in Resources) 

## Based on

  
This repository is based on a past delivery from master's students:

  

👤 **Víctor Martínez**

  

👤 **Ismael Vázquez**

  

---

  

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="http://labietelabiete.com"><img src="https://avatars.githubusercontent.com/u/72515410?v=4?s=100" width="100px;" alt=""/><br /><sub><b>labietelabiete</b></sub></a><br /><a href="https://github.com/mhfortuna/php-employee-management-v2/commits?author=labietelabiete" title="Code">💻</a> <a href="#design-labietelabiete" title="Design">🎨</a> <a href="#ideas-labietelabiete" title="Ideas, Planning, & Feedback">🤔</a> <a href="#projectManagement-labietelabiete" title="Project Management">📆</a></td>
    <td align="center"><a href="https://github.com/mhfortuna"><img src="https://avatars.githubusercontent.com/u/66578026?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Mathias Fortuna</b></sub></a><br /><a href="https://github.com/mhfortuna/php-employee-management-v2/commits?author=mhfortuna" title="Code">💻</a> <a href="#design-mhfortuna" title="Design">🎨</a> <a href="#ideas-mhfortuna" title="Ideas, Planning, & Feedback">🤔</a> <a href="#projectManagement-mhfortuna" title="Project Management">📆</a></td>
  </tr>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!