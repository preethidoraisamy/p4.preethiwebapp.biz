<!-- If User is logged in -->
        <?php if($user): ?>
        <h1>Hello,  <?php if($user): ?><?php echo $user->first_name; ?><?php endif; ?>.</h1>

        <!-- If User is NOT logged in -->
        <?php else: ?>
        
        <?php endif; ?> 

        <!-- /Landing page image -->
        <section class="techno">
                                
                <article>
                        <figure>
                                <figcaption>Welcome to Job search, both employees and employer can search for Move</figcaption>
                                <img src="images/LandingPage/landinginage.jpg" alt="Chatter" />
                              
                        </figure>
                </article>                               
                                
         </section>

         <!-- /Additional features section -->
         <section class="features">
                <article>
                         <h2>+ Features</h2>
                         <h3> Edit post</h3>
                         <h3> Delete post</h3>
                         <h3> Change password</h3>
                </article>      
         </section>

        