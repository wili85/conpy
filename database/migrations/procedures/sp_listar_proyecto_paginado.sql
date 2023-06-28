
CREATE OR REPLACE FUNCTION public.sp_listar_proyecto_paginado(p_nombre_py character varying, p_detalle_py character varying, p_estado character varying, p_pagina character varying, p_limit character varying, p_ref refcursor)
 RETURNS refcursor
 LANGUAGE plpgsql
AS $function$

Declare
--v_id numeric;
--v_numinf character varying;
v_scad varchar;
v_campos varchar;
v_tabla varchar;
v_where varchar;
v_count varchar;
v_col_count varchar;
--v_perfil varchar;

Begin

	p_pagina=(p_pagina::Integer-1)*p_limit::Integer;
	
	v_campos=' p.id,p.nombre_py,p.detalle_py,p.cod_ubigeo,u.departamento,u.provincia,u.distrito,p.estado ';

	v_tabla='from proyectos p
			inner join ubigeos u on p.cod_ubigeo=u.id_reniec ';
	
	v_where = ' Where 1=1  ';
	
	If p_nombre_py<>'' Then
	 v_where:=v_where||'And p.nombre_py ilike ''%'||p_nombre_py||'%'' ';
	End If;
	
	If p_detalle_py<>'' Then
	 v_where:=v_where||'And p.detalle_py ilike ''%'||p_detalle_py||'%'' ';
	End If;

	If p_estado<>'' Then
	 v_where:=v_where||'And p.estado = '''||p_estado||''' ';
	End If;
	
	EXECUTE ('SELECT count(1) '||v_tabla||v_where) INTO v_count;
	v_col_count:=' ,'||v_count||' as TotalRows ';

	If v_count::Integer > p_limit::Integer then
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By p.id Desc LIMIT '||p_limit||' OFFSET '||p_pagina||';'; 
	else
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By p.id Desc;'; 
	End If;
	
	--Raise Notice '%',v_scad;
	Open p_ref For Execute(v_scad);
	Return p_ref;
End

$function$
;

