<%@ Page Lenguage="VB" AutoEventWireup="false" CodeFile="Default.aspx.vb" Inherits="_Default" %>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8;"/>
</head>
<body>
<form id="form1" runat="server">
<asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    <div id="Encabezado" class="tools" runat="server">
                    <a href="#lienzo" data-tool="marker">Firmar</a> <a href="#lienzo" data-tool="eraser">Limpiar</a>
                    </div>
                    <canvas id="lienzo" runat="server" width="460" height="220"></canvas>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                    <script src="firma2.js"></script>
                    <script type="text/javascript">
                        $(function () {
                            $('#lienzo').sketch();
                            $(".tools a").eq(0).attr("style", "color:#000");
                            $(".tools a").click(function () {
                                $(".tools a").removeAttr("style");
                                $(this).attr("style", "color:#000");
                            });
                        });
                        function SaveSketch() {
                            var dataUri = $("#lienzo")[0].toDataURL();
                            $("#ruta").val(dataUri);
                            window.close();
                        };
                    </script>                            

        <asp:Button ID="btnGuardar" Text="Guardar" runat="server" OnClientClick="SaveSketch()" OnClick="cargar"  />
        <input  id="ruta" type="hidden"  name="ruta" />
</form>

</body>
</html>