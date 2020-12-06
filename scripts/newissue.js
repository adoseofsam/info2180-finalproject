window.onload = function() {
    var newissueLink = document.getElementById("newissue");

    NewIssue();
    newissueLink.onclick = NewIssue;

    document.addEventListener("click", function(e) {
        if (e.target.id === "newissue-submit") {
            let title = document.getElementById("newissue-title").value;
            let description = document.getElementById("newissue-description").value;
            let assignedTo = document.getElementById("newissue-assignedTo");
            let assignedToValue = assignedTo.options[assignedTo.selectedIndex].value;
            let type = document.getElementById("newissue-type");
            let typeValue = type.options[type.selectedIndex].value;
            let priority = document.getElementById("newissue-priority");
            let priorityValue = priority.options[priority.selectedIndex].value;

            if((title !== "") && (description !== "")) {
                submitIssue(title, description, assignedToValue, typeValue, priorityValue);
            } else {
                alert("Please fill in all fields before submission");
            }
        }
    });

    function submitIssue(title, description, assignedToValue, typeValue, priorityValue){
        event.preventDefault();
        httpRequest = new XMLHttpRequest();
        var url = "scripts/submit.php";
        httpRequest.onreadystatechange = processSubmitIssue;
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('title=' + encodeURIComponent(title) + '&description=' + encodeURIComponent(description) +  '&assignedTo=' + encodeURIComponent(assignedToValue) + "&type=" + encodeURIComponent(typeValue) + "&priority=" + encodeURIComponent(priorityValue));
    }

    function NewIssue() {
        event.preventDefault();
        let page = "newissue.php";
        let stateObj = {page: "newissue"};
        history.pushState(stateObj, null, "newissue");
        requestContent("scripts/"+page);
        document.title = 'BugMe Tracker | New Issue';
    }
    function processSubmitIssue() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                let response = httpRequest.responseText;
                if(response === "true") {
                    alert("Successfully added to database!");
                    loadHome();
                } else {
                    alert("There was a problem with adding the issue to the database");
                }
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}
    