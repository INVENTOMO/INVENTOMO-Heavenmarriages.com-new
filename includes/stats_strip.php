<div class="stats-strip" style="background: var(--primary); padding: 40px 0; color: white; margin: 40px 0;">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-around; text-align: center; gap: 30px;">
            <div class="stat-box">
                <div class="stat-number" data-target="8000"
                    style="font-size: 3rem; font-weight: 800; margin-bottom: 5px;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; font-weight: 500; opacity: 0.9;">Premium Profile</div>
            </div>

            <div class="stat-box">
                <div class="stat-number" data-target="89" data-suffix="%"
                    style="font-size: 3rem; font-weight: 800; margin-bottom: 5px;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; font-weight: 500; opacity: 0.9;">Successful Rishta
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-number" data-target="100" data-suffix="%"
                    style="font-size: 3rem; font-weight: 800; margin-bottom: 5px;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; font-weight: 500; opacity: 0.9;">Suitable Proposals
                </div>
            </div>

            <div class="stat-box">
                <div class="stat-number" data-target="100" data-suffix="%"
                    style="font-size: 3rem; font-weight: 800; margin-bottom: 5px;">0</div>
                <div class="stat-label" style="font-size: 1.1rem; font-weight: 500; opacity: 0.9;">Customer Support
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.stat-number');
        const speed = 200; // The lower the slower

        const animateCounters = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const suffix = counter.getAttribute('data-suffix') || '+';
                    const count = +counter.innerText.replace(/\D/g, ''); // Get numeric part of current text

                    // Lower inc to slow and higher to speed
                    const inc = target / speed;

                    if (count < target) {
                        // Add inc to count and output in counter
                        counter.innerText = Math.ceil(count + inc) + (suffix);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target + suffix;
                    }
                };
                updateCount();
            });
        };

        // Trigger animation when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target); // Only run once
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-strip');
        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>