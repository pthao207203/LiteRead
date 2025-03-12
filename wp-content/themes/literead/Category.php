<?php
/* Template Name: Category */
get_header();

global $wpdb;
$categories = $wpdb->get_results("SELECT * FROM wp_type");
?>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"
/>
<link
  href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Moul&display=swap"
  rel="stylesheet"
/>
<div class="mx-auto w-full max-w-none min-h-screen bg-white max-md:max-w-[114.25rem]">
    <main class="px-14 py-9 bg-white max-md:px-[2rem] max-md:py-[1.25rem]">
      <div class="flex flex-col gap-[1rem]">
        <h2 class="text-3xl font-semibold tracking-wide leading-6 text-[#A04D4C]">
          Thể loại
        </h2>
        <div class="flex flex-wrap gap-[1rem] justify-center items-start max-md:gap-3">
          <!-- <button class="px-[0.625rem] py-[1.25rem] text-2xl text-[#803D3D] bg-[#FFE5E1] rounded-[0.5rem] cursor-pointer w-[11.25rem] max-md:px-[0.5rem] max-md:py-[1rem] max-md:text-xl max-md:w-[9.375rem]">
            ABO
          </button> -->
          <?php foreach ($categories as $category): ?>
            <button onclick="window.location.href='<?php echo home_url('/chi-tiet-the-loai/') . '?category=' . urlencode($category->type_name); ?>'"
                class="px-[0.625rem] py-[1.25rem] text-2xl text-[#803D3D] bg-[#FFE5E1] rounded-[0.5rem] cursor-pointer w-[11.25rem] text-center max-md:w-[9.375rem]">
                <?php echo esc_html($category->type_name); ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>
    </main>
</div>
<?php get_footer(); ?>