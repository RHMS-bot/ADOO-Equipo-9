<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*,java.io.*" %>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="UTF-8">
        <title>Cat&aacute;logo</title>
        <link rel="stylesheet" href=".\css\style.css">
    </head>
    <body>

        <div class="wrap">
            <h1>Catálogo</h1>
            <div class="store-wrapper">
                <div class="category_list">
                    <a href="#" class="category_item" category="all">Todo</a>
                    <a href="#" class="category_item" category="ordenadores">Cuidado de la piel</a>
                    <a href="#" class="category_item" category="laptops">Maquillaje</a>
                    <a href="#" class="category_item" category="smartphones">Fragancias</a>
                    <a href="#" class="category_item" category="monitores">Cuerpo y Sol</a>
                </div>

                <div class="products-list">
                    <%                Connection c = null;
                        Statement s = null;
                        ResultSet r = null;
                        try {
                            Class.forName("com.mysql.jdbc.Driver").newInstance();
                            c = DriverManager.getConnection("jdbc:mysql://localhost:3306/Itzamara", "root", "more1015");
                            s = c.createStatement();
                        } catch (SQLException error) {
                            out.print(error.toString());
                        }

                        try {
                            r = s.executeQuery("select nombre,precio,cantidad,tipo,imagen from Producto;");

                            while (r.next()) {
                                String nombre = r.getString("nombre");
                                float precio = r.getFloat("precio");
                                int cantidad = r.getInt("cantidad");
                                String tipo = r.getString("tipo");
                                String imagen = r.getString("imagen");
                                String ruta = "." + "\\" + "Imagenes" + "\\";

                                out.println("<div class='product-item'>");
                                out.println("<img src=" + ruta + "" + imagen + ">");
                                out.println("<div class='item-text'>");
                                out.println("<h3 class='text-center'>" + nombre + "</h3>");
                                out.println("<br>");
                                out.println("<p>$" + precio + "</p>");
                                out.println("<br>");
                                out.println("<p>" + tipo + "</p>");
                                out.println("</div>");
                                out.println("</div>");

                            }
                        } catch (SQLException error) {
                            out.print(error.toString());
                        }
                    %>
                </div>
            </div>
        </div>
    </body>
</html>
