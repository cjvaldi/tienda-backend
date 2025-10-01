# 🚀 Pull Request – Integración de HU1 a HU5 (CRUD Productos)

## 📌 Descripción
Este PR integra el trabajo realizado en la rama `dev` hacia `main`.  
Incluye el desarrollo completo del CRUD para la entidad **productos** en la API de la Tienda de Camisetas.

## ✅ Cambios incluidos
- [ ] HU1: GET /productos → Listar todos los productos
- [ ] HU2: POST /productos → Crear un nuevo producto
- [ ] HU3: GET /productos/{id} → Obtener un producto por ID
- [ ] HU4: PUT /productos/{id} → Actualizar un producto existente
- [ ] HU5: DELETE /productos/{id} → Eliminar un producto

## 🧪 Cómo probar
1. Levantar el servidor con:  
   ```bash
   php -S localhost:8000 -t public
   ```

2. Importar la colección de Postman incluida en `/docs/postman_collection.json`

3. Ejecutar las pruebas de cada endpoint:
   - GET /productos
   - POST /productos
   - GET /productos/{id}
   - PUT /productos/{id}
   - DELETE /productos/{id}

## 📝 Checklist
- [ ] El código compila sin errores
- [ ] Se han probado todos los endpoints en Postman
- [ ] La base de datos tiene datos de prueba
- [ ] Se ha actualizado la documentación si es necesario
- [ ] El código sigue las convenciones del proyecto

## 🔗 Issues relacionados
Closes #1, #2, #3, #4, #5

## 📸 Capturas de pantalla (opcional)
<!-- Si tienes capturas de Postman o de la base de datos, agrégalas aquí -->

## 💬 Notas adicionales
<!-- Cualquier información adicional que el revisor deba saber -->