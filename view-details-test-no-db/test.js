var issueID;
var issues;
var dynamicsection;
var closedbtn;
var inprogressbtn;

window.onload = function() {
    /*Instead of being in window.onload, the following lines(except dynamicsection) 
    would probably be located in the response section of the AJAX request where the 
    new HTML for the Issues page was returned.
    For example the ClickHandler functions update the dynamicsection with new HTML, 
    so the JS code for this new HTML has to be placed within the scope of these new HTML elements.*/
    //I'm referring to dynamicsection as the area that is below the header and to the right of the sidebar.
    issues = document.getElementsByClassName("issues");
    for(i = 0; i < issues.length; i++) {
        issues[i].addEventListener("click", issueClickHandler);
    }
    dynamicsection = document.getElementById("dynamic-section");
}

/*Each issue could have an id which is its unique identifier, this could be its own id in the database.
The following function can be on each the tag of each issue in the HTML file as onClick="getIssueID(this.id)"
This will allow me to get the id on click and pass it as a query string so on the php side i can use it to query the 
database and retrieve the necessary table entry to update the HTML*/
function getIssueID(id) {
    issueID = id;
  }

//The following *ClickHandler functions will make an AJAX request and update the page with the necessary information.
//The only difference is the context.
//So on the php side the issueID will be used in the SQL statement in the WHERE clause to indicate which issue to retreive.
//context will determine how it will be handled, view details and mark issue as closed or in-progress
function issueClickHandler() {
    url = "test.php?id="+issueID+"&context=view-details";
    fetch(url).then(response => response.text()).then(data => {
        dynamicsection.innerHTML = data;
        closedbtn = document.querySelector(".closed").addEventListener("click", closedbtnClickHandler);
        inprogressbtn = document.querySelector(".in-progress").addEventListener("click", inprogressbtnClickHandler);
    });
}

function closedbtnClickHandler() {
    url = "test.php?id="+issueID+"&context=closed";
    fetch(url).then(response => response.text()).then(data => {
        dynamicsection.innerHTML = data;
        closedbtn = document.querySelector(".closed").addEventListener("click", closedbtnClickHandler);
        inprogressbtn = document.querySelector(".in-progress").addEventListener("click", inprogressbtnClickHandler);
    });
}

function inprogressbtnClickHandler() {
    url = "test.php?id="+issueID+"&context=in-progress";
    fetch(url).then(response => response.text()).then(data => {
        dynamicsection.innerHTML = data
        closedbtn = document.querySelector(".closed").addEventListener("click", closedbtnClickHandler);
        inprogressbtn = document.querySelector(".in-progress").addEventListener("click", inprogressbtnClickHandler);
        ;});
}