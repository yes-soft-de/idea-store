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
#### Create Order
```
  /order/{idProject}/{idUser}
  methods={"POST"}
```
