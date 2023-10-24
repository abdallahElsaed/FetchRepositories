# Fetch The Most Popular Repositories

### INDEX

1. Introduction 
2. How to install it?
3. What is used in the app?
4. What does the app actually do?

---

### Introduction

I made this app to show the most popular repositories from GitHub or from any API endpoint.

### How to install it?

1. First, you will install composer in the project by → `composer install`.
2. Go to your browser and write the index URL → .`../public/index.php`. 
3. Enter your inputs to filter the repository.

### What is used in the app?

- I use **Composer** to make an autoload for all Namespaces in the index file.
- I use an **MVC** design pattern to structure my project but I don’t use a Model in this task.

**App Structure**

```
	- app
		-controller
		- services
	- public 
	- view
	- route
	- tests 
```

### What does the app actually do?

I will talk about the cycle in this app:

- When go to the browser and write your query.
- The requests go to route in this phase go to controller for this route and make an action.
- In this controller, I access API and pass a specific query and the result comes.

**First in route**

![route in index.png](Fetch%20The%20Most%20Popular%20Repositories%2005438d8e167f4ed58e75eeeef7af176a/route_in_index.png)

**Second in controller**

![controller.png](Fetch%20The%20Most%20Popular%20Repositories%2005438d8e167f4ed58e75eeeef7af176a/controller.png)

**Third in Github service to make actually work:**

![getData method22.png](Fetch%20The%20Most%20Popular%20Repositories%2005438d8e167f4ed58e75eeeef7af176a/getData_method22.png)
