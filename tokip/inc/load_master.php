<div id="loader-wrapper">
        <div class="loader"></div>
    </div>
    <script>
   window.addEventListener('load', function() {
         const loaderWrapper = document.getElementById('loader-wrapper');

         setTimeout(function() {
            loaderWrapper.style.opacity = '0';
            
            setTimeout(function() {
                  loaderWrapper.style.display = 'none';
            }, 700); 

         }, 300); 
      });
   </script>
      <style>
        .kapanma-animasyonu {
            transition: transform 0.5s ease-in-out, opacity 0.4s ease-in-out, max-height 0.6s ease-in-out;
            transform: translateY(-20px);
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            padding-top: 0;
            padding-bottom: 0;
            margin-top: 0;
            margin-bottom: 0;
            border-width: 0;
        }

        .acilma-animasyonu {
            animation: fadeInDown 0.6s ease-in-out forwards;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
                max-height: 0;
            }
            to {
                opacity: 1;
                transform: translateY(0);
                max-height: 1000px; 
            }
        }

      #loader-wrapper {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;

         display: flex;
         justify-content: center;
         align-items: center;
         z-index: 9999;

         opacity: 1;
         transition: opacity 0.4s ease-out;
         backdrop-filter: blur(1px);

         background-color: rgba(255, 255, 255, 0.6); 
      }

      .loader {
         position: relative;
         width: 64px;
         height: 64px;
         border-radius: 50%;
         animation: spin-cw 2s linear infinite;
         border: 3px solid transparent;
         border-top-color: #42c2f4ff; 
      }

      .loader::after {
         content: '';
         position: absolute;
         top: 6px;
         left: 6px;
         right: 6px;
         bottom: 6px;
         border-radius: 50%;
         border: 3px solid transparent;
         border-top-color: #28d6e2ff;
         animation: spin-ccw 0.5s linear infinite;
      }

      @keyframes spin-cw {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
      }

      @keyframes spin-ccw {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(-360deg); }
      }

       .loader-spinner {
               border: 2px solid #24a2ebff;
               border-top-color: white;
               border-radius: 50%;
               width: 16px;
               height: 16px;
               animation: spin 0.8s linear infinite;
            }
            .loader-hidden {
               display: none;
            }
            @keyframes spin {
               0% { transform: rotate(0deg); }
               100% { transform: rotate(360deg); }
            }
</style>