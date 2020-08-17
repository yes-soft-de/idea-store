# idea-store


## API guide 

### Projects
#### Create Project
```
  /project
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