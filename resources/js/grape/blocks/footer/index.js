editor.BlockManager.add('footer-section', {
    label: 'Footer',
    category: 'Sections',
    content: `
      <footer class="footer-section">
        <div class="footer-container">
          <div class="footer-info">
            <h3 class="footer-title">About Me</h3>
            <p class="footer-description">I am a passionate web developer focused on creating beautiful, responsive, and functional websites.</p>
          </div>
          <div class="footer-social">
            <h3 class="footer-title">Follow Me</h3>
            <ul class="social-links">
              <li><a href="#" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" target="_blank" class="social-link"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#" target="_blank" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2024 Your Name. All Rights Reserved.</p>
        </div>
      </footer>
    `,
    // Traits para o usuário poder adicionar links personalizados
    traits: [
      {
        type: 'text',
        label: 'Facebook Link',
        name: 'facebook-link',
        placeholder: 'https://facebook.com/yourprofile',
        changeProp: 1,
      },
      {
        type: 'text',
        label: 'Twitter Link',
        name: 'twitter-link',
        placeholder: 'https://twitter.com/yourprofile',
        changeProp: 1,
      },
      {
        type: 'text',
        label: 'LinkedIn Link',
        name: 'linkedin-link',
        placeholder: 'https://linkedin.com/yourprofile',
        changeProp: 1,
      },
      {
        type: 'text',
        label: 'GitHub Link',
        name: 'github-link',
        placeholder: 'https://github.com/yourprofile',
        changeProp: 1,
      }
    ],
    // Script para aplicar os links dinamicamente
    script: function() {
      var socialLinks = {
        facebook: this.getAttribute('facebook-link') || '#',
        twitter: this.getAttribute('twitter-link') || '#',
        linkedin: this.getAttribute('linkedin-link') || '#',
        github: this.getAttribute('github-link') || '#'
      };
  
      this.querySelectorAll('.social-link').forEach(function(link, index) {
        switch (index) {
          case 0:
            link.setAttribute('href', socialLinks.facebook);
            break;
          case 1:
            link.setAttribute('href', socialLinks.twitter);
            break;
          case 2:
            link.setAttribute('href', socialLinks.linkedin);
            break;
          case 3:
            link.setAttribute('href', socialLinks.github);
            break;
        }
      });
    }
  });
  