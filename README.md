# idea-store


## API guide 

### Projects
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
### Orders
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
### Articles
#### Create new article
```
/articles
method={"POST"}
```
#### Update existing article
```
/articles/{id}
method={"PUT"}
```
#### Get an article by ID
```
/articles/{id}
method={"GET"}
```
#### Get all articles
```
/articles
method={"GET"}
```
#### Delete existing article
```
/articles/{id}
method={"DELETE"}
```

### Categories
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
>>>>>>> caa2937a493a5d4d7485931b44580a109acaee21
```
### Special Ideas
#### Create special idea
```
/special-idea/{idCategory}
methods={"POST"}
```
#### Get all special ideas
```
/special-idea
methods={"GET"}
```
#### Get a special idea
```
/special-idea/{id}
methods={"GET"}
```
#### Delete existing special idea
```
/special-idea/{id}
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
