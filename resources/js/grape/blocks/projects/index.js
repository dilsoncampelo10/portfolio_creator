editor.BlockManager.add('projects-section', {
    label: 'Projetos',
    category: 'Seção',
    media: '<img src=/assets/img/icons/editor/projects.svg>',
    content: `
      <section class="projects-section">
        <div class="projects-container">
          <h2 class="section-title">My Projects</h2>
          <div class="projects-grid">
            <div class="project-item">
              <img src="https://via.placeholder.com/300" alt="Project Image" class="project-image">
              <h3 class="project-title">Project 1</h3>
              <p class="project-description">This is a brief description of Project 1. It's a web application built using HTML, CSS, and JavaScript.</p>
              <a href="#" class="project-link">View Project</a>
            </div>
  
            <div class="project-item">
              <img src="https://via.placeholder.com/300" alt="Project Image" class="project-image">
              <h3 class="project-title">Project 2</h3>
              <p class="project-description">Project 2 is a mobile app developed with Flutter. It helps users track their daily tasks.</p>
              <a href="#" class="project-link">View Project</a>
            </div>
  
            <div class="project-item">
              <img src="https://via.placeholder.com/300" alt="Project Image" class="project-image">
              <h3 class="project-title">Project 3</h3>
              <p class="project-description">A custom CMS system built with Laravel, designed for small businesses to manage their content easily.</p>
              <a href="#" class="project-link">View Project</a>
            </div>
          </div>
        </div>
      </section>
    `
  });
  