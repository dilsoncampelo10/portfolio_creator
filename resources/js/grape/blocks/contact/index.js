editor.BlockManager.add('contact-section', {
    label: 'Contact Section',
    category: 'Seção',
    content: `
      <section class="contact-section">
        <div class="contact-container">
          <h2 class="contact-title">Get In Touch</h2>
          <p class="contact-description">I'd love to hear from you! Whether it's a project inquiry, a question, or just to say hello, feel free to reach out to me.</p>
          
          <form class="contact-form" action="/send-message" method="POST">
            <div class="form-group">
              <input type="text" id="name" name="name" placeholder="Your Name" required class="form-input">
            </div>
            <div class="form-group">
              <input type="email" id="email" name="email" placeholder="Your Email" required class="form-input">
            </div>
            <div class="form-group">
              <textarea id="message" name="message" rows="5" placeholder="Your Message" required class="form-textarea"></textarea>
            </div>
            <button type="submit" class="contact-btn">Send Message</button>
          </form>
        </div>
      </section>
    `,
    // Adicionando os traits
    traits: [
      {
        type: 'text',
        label: 'Action URL',
        name: 'action',
        placeholder: 'URL to send the form data',
        changeProp: 1, // Faz com que o valor seja atualizado no HTML
      },
      {
        type: 'select',
        label: 'Method',
        name: 'method',
        options: [
          { value: 'GET', name: 'GET' },
          { value: 'POST', name: 'POST' }
        ],
        changeProp: 1, // Faz com que o valor seja atualizado no HTML
      }
    ],
  
    // Atualizando o componente de form quando os traits mudarem
    script: function() {
      var form = this.querySelector('form');
      form.setAttribute('action', this.getAttribute('action') || '/send-message');
      form.setAttribute('method', this.getAttribute('method') || 'POST');
    }
  });
  