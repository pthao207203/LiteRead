<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="google-site-verification" content="wPRr0TbbvWTsztW_CeL2_nlnuVXhpRmVaGewPE1lmAg" />
  <meta name="botw-verify" content="jch7z62u" />
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<title><?php bloginfo('name'); ?> | <?php wp_title('', true, 'left'); ?></title>-->
  <title><?php bloginfo('name'); ?> | <?php wp_title('', true, 'left'); ?></title>
  <?php wp_head(); ?>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9357894106826270"
    crossorigin="anonymous"></script>
  <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script> <!-- Quảng cáo -->
  <script>
    tailwind.config = {
      content: ["./src/**/*.{html,js}"],
      theme: {
        extend: {
          fontFamily: {
            montserrat: ['Montserrat', 'sans-serif'],
          },
          colors: {
            orange: {
              light: '#FFF7F5',
              'light-hover': '#FFF2F0',
              'light-active': '#FFE5E1',
              normal: '#FFAA9D',
              'normal-hover': '#E6998D',
              'normal-active': '#CC887E',
              dark: '#BF8076',
              'dark-hover': '#99665E',
              'dark-active': '#734C47',
              darker: '#593B37',
            },
            red: {
              light: '#FBF0F0',
              'light-hover': '#F9E8E8',
              'light-active': '#F2D0CF',
              normal: '#D56665',
              'normal-hover': '#C05C5B',
              'normal-active': '#AA5251',
              dark: '#A04D4C',
              'dark-hover': '#803D3D',
              'dark-active': '#602E2D',
              darker: '#4B2423',
            },
          },
        },
      },
    }
  </script>
  <script>
    document.cookie = "screen_width=" + (window.innerWidth) + "; path=/";
    document.cookie = "screen_height=" + (window.innerHeight) + "; path=/";
  </script>
</head>

<body <?php body_class(); ?> style="font-family: 'Montserrat', sans-serif !important; background-color: #FFE5E1">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- === Header === -->
  <header
    class="fixed top-0 left-0 flex justify-between items-center md:px-[2.125rem] md:py-[0.625rem] p-[0.625rem] gap-[1rem] md:gap-[2.875rem] w-full bg-orange-light-active z-50">
    <div class="flex flex-row gap-[1rem] md:gap-[2.875rem]">
      <?php if (!is_page_template(['Signup.php', 'Login.php'])): ?>
        <div class="flex gap-2.5 items-center">
          <!-- Nút Hamburger mở Sidebar -->
          <button id="openSidebarBtn" class="w-[30px] max-md:w-[1.8rem]" aria-label="Menu">
            <div class="w-full bg-red-normal h-[0.125rem] rounded-full"></div>
            <div class="mt-1.5 w-full bg-red-normal h-0.5 rounded-full"></div>
            <div class="mt-1.5 w-full bg-red-normal h-0.5 rounded-full"></div>
          </button>
        </div>
      <?php endif; ?>

      <a href="<?php echo esc_url(home_url('/')); ?>"
        class="hover:no-underline hover:text-orange-dark text-orange-darker">
        <h1 class="flex-1 shrink self-stretch my-auto text-[24px] md:text-[2rem] text-[#D66766] font-[Moul] basis-0">
          LiteRead
        </h1>
      </a>
    </div>

    <div id="category-overlay"
      class="hidden fixed top-[calc(100%+0.5rem)] left-0 w-full z-[1000] bg-white shadow-lg max-h-[calc(100vh-100px)] overflow-y-auto">
      <?php include get_template_directory() . '/Category.php'; ?>
    </div>

    <form role="search" method="GET" action="<?php echo esc_url(home_url('/tim-kiem/')); ?>"
      class="flex items-center gap-[1.25rem] my-auto px-[1.25rem] max-md:p-[0.625rem] py-[0.625rem] bg-white max-h-[3.125rem] rounded-full w-full max-md:w-auto">
      <!-- Nút tìm kiếm -->
      <button type="submit" aria-label="Search" class="flex justify-center items-center">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
          class="w-[1.5rem] h-[1.5rem] ">
          <path
            d="M11.5 21.75C5.85 21.75 1.25 17.15 1.25 11.5C1.25 5.85 5.85 1.25 11.5 1.25C17.15 1.25 21.75 5.85 21.75 11.5C21.75 17.15 17.15 21.75 11.5 21.75ZM11.5 2.75C6.67 2.75 2.75 6.68 2.75 11.5C2.75 16.32 6.67 20.25 11.5 20.25C16.33 20.25 20.25 16.32 20.25 11.5C20.25 6.68 16.33 2.75 11.5 2.75Z"
            fill="#A04D4C" />
          <path
            d="M21.9999 22.75C21.8099 22.75 21.6199 22.68 21.4699 22.53L19.4699 20.53C19.1799 20.24 19.1799 19.76 19.4699 19.47C19.7599 19.18 20.2399 19.18 20.5299 19.47L22.5299 21.47C22.8199 21.76 22.8199 22.24 22.5299 22.53C22.3799 22.68 22.1899 22.75 21.9999 22.75Z"
            fill="#A04D4C" />
        </svg>
      </button>

      <!-- Ô input tìm kiếm -->
      <input type="search" name="search_query" id="search-input" placeholder="Tìm truyện..."
        class="flex-1 md:text-[1.25rem] bg-transparent border-none outline-none placeholder-red-dark text-red-dark focus:ring-2 focus:ring-red-dark focus:ring-opacity-50 max-md:hidden" />
    </form>

  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const searchButton = document.querySelector('form[role="search"] button[type="submit"]'); // Search button
      const overlay = document.getElementById('category-overlay');
      const searchForm = document.querySelector('form[role="search"]');

      // Function to position the overlay under the search bar
      const positionOverlay = () => {
        const rect = searchForm.getBoundingClientRect();
        overlay.style.top = `${rect.bottom + window.scrollY}px`; // Position overlay
        overlay.style.left = `0`; // Overlay will be aligned to the left
        overlay.style.width = `100%`; // Width will match the search bar
      };

      // Show overlay when clicking the search button
      searchButton.addEventListener('click', function (e) {
        if (document.querySelector('input[name="search_query"]').value === '') {
          e.preventDefault(); // Prevent default form submission
          e.stopPropagation(); // Stop event from propagating to document
          positionOverlay(); // Position the overlay
          overlay.classList.remove('hidden'); // Show overlay
        }
      });

      // Hide overlay when clicking outside
      document.addEventListener('click', function (e) {
        if (!overlay.contains(e.target) && e.target !== searchButton) {
          overlay.classList.add('hidden'); // Hide overlay
        }
      });

      // Prevent overlay from closing when clicking inside it
      overlay.addEventListener('click', function (e) {
        e.stopPropagation();
      });

      // Reposition overlay on window resize or scroll
      window.addEventListener('resize', positionOverlay);
      window.addEventListener('scroll', positionOverlay); // Keep overlay fixed under search bar when scrolling
    });
  </script>

</body>

</html>