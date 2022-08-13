<div id="sidebar"> 
    <h4 class="subheader">Sidebar</h4><br><br>
    Current time: <div id="czas"></div><br>
                    <script type="text/javascript">
                        function getTime() 
                        {
                            return (new Date()).toLocaleTimeString();
                        }
                        document.getElementById('czas').innerHTML = getTime();
                        setInterval(function() {
                            document.getElementById('czas').innerHTML = getTime();
                        }, 1000);
                    </script>
    <script>
        if ( window.history.replaceState ) 
        {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <br>Add a comment:<br><br>
    <form action ="index.php" method ="post">
        Name: <br />
        <input type="text" name="Name"/><br />
        Comment: <br />
        <input type="text" name="Comment"/><br />
        <input type="submit" value="Add comment" />
    </form>    
</div>