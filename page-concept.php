<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<main>
                <div class="main_inner mt">
                    <div class="concept">
                    <h2 class="title">子供食堂とは</h2>
                    <div class="text">
                        <p>
                            こども食堂は、子どもたちが安心して食事ができる場所で、食材を提供し、食事を作る場所です。多くは、地域のボランティアや市民団体などが運営しており、家庭の事情によって十分な食事を摂れない子どもたちに、無料または低額で食事を提供しています。
                        </p>
                    </div>
                    <div class="text">
                        <p>
                            こども食堂は、子どもたちの食生活や栄養バランスの改善、社会的孤立の解消、地域の交流促進など、様々な社会問題に取り組む場でもあります。また、地域の食材や調理方法など、地域特有の食文化を守り、伝える役割も担っています。
                        </p>
                    </div>
                    <div class="text">
                        <p>
                            こども食堂は、子どもたちの健やかな成長を支援するために、全国各地で展開されています。
                        </p>
                    </div>
                    <a href="<?php echo home_url('/faq'); ?>" ><div class="btn qbtn">FAQ</div></a>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/child/rice.png" alt="背景" class="concept_img rice">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/child/curry.png" alt="背景" class="concept_img curry">
                    </div>
                </div>
            </main>


<?php get_footer(); ?>