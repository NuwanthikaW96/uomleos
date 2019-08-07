<?php

/**
 * 
 * Skills Section
 * 
 * @package FortySeven Street
 * 
 */
?>
<div class="street-wrapper">
    <div class="skill_section">
        <div class="container">
            <div class="skills-loader wow fadeInUp">
                <?php 
                if(is_active_sidebar('fortyseven-street-skills-section')){
                    dynamic_sidebar('fortyseven-street-skills-section'); 
                }
                ?>
            </div>
        </div>
    </div>  
</div>