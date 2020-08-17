# idea-store


## API guide 

#### Create Project
```
  /project/{idCategory}
  methods={"POST"}
```
  
#### Get All Projects with images
```
/projects
methods={"GET"}
```
#### Get Project By Id with images
```
/project/{id}
methods={"GET"}
```
#### Delete Project By Id
```
/project/{id}
methods={"DELETE"}
```
#### Update Project 
```
/project/{id}
methods={"PUT"}
```
#### Create Order
```
  /order/{idProject}/{idUser}
  methods={"POST"}
```
#### Get Order By Id
```
  /order/{id}
  methods={"GET"}
```
#### Get All Orders
```
/orders
methods={"GET"}
```
#### Delete Order By Id
```
/order/{id}
methods={"DELETE"}
```
#### Update Order 
```
/order/{id}/{idProject}/{idUser}
methods={"PUT"}
```
#### create category
```
/category
methods={"POST"}
```
#### update Category
```
category/{id}
methods={"PUT"}
```
#### get All Categories
```
/categories
methods={"GET"}
```
#### delete Category
```
/category/{id}
methods={"DELETE"}
```
#### get All Featured Ideas
```
/FeaturedIdeas
methods={"GET"}

```
#### get All Categories With Project
```
/categoriesWithProject
methods={"GET"}
```

## Security APIs Guide 

#### Create new user
```
  Path: /register
  methods={"POST"}
```
#### Get All Users
```
  Path: /users
  methods={"GET"}
```
#### Get User By Id
```
  Path: /users/{id}
  methods={"GET"}
```
#### Login
```
  Path: /login
  methods={"POST"}
```
#### Get logged-in user's Profile 
```
  Path: /profile
  methods={"GET"}
```
#### Logout 
```
  Path: /logout
  
```
