document.getElementById('project-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    const professorName = document.getElementById('professor-name').value;
    const projectTitle = document.getElementById('project-title').value;
    const projectDescription = document.getElementById('project-description').value;

    // Create a new project item
    const projectItem = document.createElement('div');
    projectItem.classList.add('project-item');
    projectItem.innerHTML = `
        <h3>${projectTitle}</h3>
        <p><strong>Professor:</strong> ${professorName}</p>
        <p>${projectDescription}</p>
        <button onclick="applyForProject('${projectTitle}')">Apply</button>
    `;

    // Append the new project item to the projects list
    document.getElementById('projects-list').appendChild(projectItem);

    // Clear the form
    document.getElementById('project-form').reset();
});

function applyForProject(projectTitle) {
    alert(`You have applied for the project: ${projectTitle}`);
}
