<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
    <?php wp_head(); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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
    <script src="https://cdn.tiny.cloud/1/ra8co6ju1rrspizsq3cqhi3e8p7iknltlh2v77d58cbrys8m/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script >
      tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
      });
    </script>
</head>
<body <?php body_class(); ?>>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- === Header === -->
<header>
  <nav class="overflow-hidden w-full bg-red-100">
    <div
      class="flex justify-between items-center px-4 py-1.5 w-full bg-red-100"
    >
      <h1
        class="flex-1 shrink self-stretch my-auto text-[1.5rem] md:text-[2rem] text-[#D66766] font-[Moul] basis-0"
      >
        LiteRead
      </h1>
      <div class="flex gap-2.5 items-center self-stretch my-auto">
        <button
          class="flex shrink-0 self-stretch my-auto w-6 h-6"
          aria-label="Search"
        >
          <span class="sr-only">Search</span>
        </button>
        <button
          class="flex shrink-0 self-stretch my-auto w-6 h-6"
          aria-label="User profile"
        >
          <span class="sr-only">Profile</span>
        </button>
        <button class="self-stretch my-auto w-[30px]" aria-label="Menu">
          <div class="flex w-full bg-red-normal min-h-0.5 rounded-[99px]"></div>
          <div
            class="flex mt-1.5 w-full bg-red-normal min-h-0.5 rounded-[99px]"
          ></div>
          <div
            class="flex mt-1.5 w-full bg-red-normal min-h-0.5 rounded-[99px]"
          ></div>
        </button>
      </div>
    </div>
  </nav>
</header>