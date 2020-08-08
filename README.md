# idea-store


## API guide 

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
