<?php
/*
Definfing namespaces
PHP.NET
*/  
namespace MyProjet;
const CONNECT_OK = 1;
class connection {/*...*/}
function connect(){ /*...*/}
/*
Exemplo?

<html>
<?php
namespace MyProject; // fatal error - namespace must be the first stament in the script

Declaring sub-namespaces

*/  
namespace MyProject\Sub\Level;
const CONNECT_OK = 2;
class connection {/*...*/}
function connect(){ /*...*/}

/*
Defining multiple namespaces in the same file 
Multiple namespaces may also be declared in the same file 
*/
