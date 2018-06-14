$(function() {
	$('#refresh').click(function(evt){
		$('.table-div').load(location.href + " .table-div")
		evt.preventDefault();
	});
});


window.setInterval(function(){
	$(function(){
		//$.post( "../../scripts/clusterlist.php", { func: "clusterlist()" }, function(success) {
			$('#ClusterLive').load(location.href + " #ClusterLive")
		//}); 
	}); }, 4000);