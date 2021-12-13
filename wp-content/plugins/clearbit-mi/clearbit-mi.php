<?php
/*
Plugin Name: Clearbit MonsterInsights Pro Integration
Plugin URI: 
Description: 
Version: 
Author: 
Author URI: 
License: 
License URI: 
*/

//-------------------------------
// Custom script in head section
//-------------------------------

function clearbit_after_mi(){
?>
<script>
ga(function(){
  ga_trackers=[];
  ga.getAll().forEach(function(x,i){
  ga_trackers.push(x.get('name'))});
  ga_trackers.forEach(
  function(gaName){
    ga(gaName + '.require', 'Clearbit', {"mapping":{
      "type":"dimension10",
      "companyName":"dimension11", 
      "companyDomain":"dimension12", 
      "companyIndustry":"dimension13", 
      "companySubIndustry":"dimension14", 
      "companyEmployeesRange":"dimension15", 
      "companyEstimatedAnnualRevenue":"dimension16", 
      "companyAlexaRank":"dimension17",
      "companyCity":"dimension18",
      "companyState":"dimension19",
      "companyCountry":"dimension20",
      "companySicCode":"dimension4",
      "companyTech":"dimension7",
	  "companyTags":"dimension8" }
    });
  });
});
</script>
<script async src="https://ga.clearbit.com/v1/ga.js?authorization=pk_af3610979e39946221cb9bdae6d37cae"></script>
<?php
}
add_action( 'wp_head', 'clearbit_after_mi', 7 );
