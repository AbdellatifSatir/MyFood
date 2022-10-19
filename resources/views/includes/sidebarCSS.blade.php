
<style>
/*
DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
font-family: 'Poppins', sans-serif;
background: #fafafa;
}

p {
font-family: 'Poppins', sans-serif;
font-size: 1.1em;
font-weight: 300;
line-height: 1.7em;
color: #999;
}

a,
a:hover,
a:focus {
color: inherit;
text-decoration: none;
transition: all 0.3s;
}

.line {
width: 100%;
height: 1px;
border-bottom: 1px dashed #ddd;
margin: 40px 0;
}

/* ---------------------------------------------------
SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
display: flex;
width: 100%;
align-items: stretch;
}

#sidebar {
min-width: 250px;
max-width: 250px;
background: rgb(17, 17, 17);
color: #fff;
transition: all 0.3s;
}

#sidebar.active {
margin-left: -250px;
}

#sidebar .sidebar-header {
padding: 20px;
background: rgb(59, 59, 59);
}

#sidebar ul.components {
padding: 20px 0;
border-bottom: 1px solid #47748b;
}

#sidebar ul p {
color: #fff;
padding: 10px;
}

#sidebar ul li a {
padding: 10px;
font-size: 1.1em;
display: block;
}

#sidebar ul li a:hover {
color: #ffffff;
background: #FFCC00;
}

ul ul a {
font-size: 0.9em !important;
padding-left: 30px !important;
background: #6d7fcc;
}

ul.CTAs {
padding: 20px;
}

ul.CTAs a {
text-align: center;
font-size: 0.9em !important;
display: block;
border-radius: 5px;
margin-bottom: 5px;
}

a.download {
background: #fff;
color: #7386D5;
}

a.article,
a.article:hover {
background: #6d7fcc !important;
color: #fff !important;
}

/* ---------------------------------------------------
CONTENT STYLE
----------------------------------------------------- */

#content {
width: 100%;
padding: 20px;
min-height: 100vh;
transition: all 0.3s;
}

/* ---------------------------------------------------
MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
#sidebar {
    margin-left: -250px;
}
#sidebar.active {
    margin-left: 0;
}
#sidebarCollapse span {
    display: none;
}
}
</style>