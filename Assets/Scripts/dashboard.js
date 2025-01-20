document.addEventListener('DOMContentLoaded', () => {
    const controlCards = document.querySelectorAll('.control-card');


    const sanitizeURL = (url) => {
        try {

            const sanitizedURL = new URL(url, window.location.origin);
            return sanitizedURL.href;
        } catch (error) {
            console.error('Invalid URL detected:', url);
            return null;
        }
    };

    controlCards.forEach(card => {
        card.addEventListener('click', () => {
            const url = card.getAttribute('data-url');


            const safeURL = sanitizeURL(url);
            if (safeURL) {

                if (card.classList.contains('critical-action')) {
                    const userConfirmed = confirm('Are you sure you want to proceed?');
                    if (!userConfirmed) {
                        console.log('Action cancelled by the user.');
                        return;
                    }
                }


                window.location.href = safeURL;
            } else {
                console.error('No valid URL specified for this card.');
            }
        });


        card.addEventListener('mouseover', () => {
            card.style.cursor = 'pointer';
            card.style.backgroundColor = '#2b2b2b';
        });

        card.addEventListener('mouseout', () => {
            card.style.backgroundColor = '';
        });
    });
});
