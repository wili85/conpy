CREATE OR REPLACE FUNCTION public.sp_listar_expediente_movimiento_paginado(p_id_expediente character varying, p_pagina character varying, p_limit character varying, p_ref refcursor)
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
	
	v_campos='dj.nombre distrito_judicial,oj.nombre organo_jurisdiccional,
p.a_paterno||'' ''||p.a_materno||'' ''||p.nombres responsable,tm.denominacion estado_mov ';

	v_tabla='from mov_expedientes me 
inner join tabla_maestras tm on tm.codigo=me.estado_mov and tm.tipo=''EST_MOV''
inner join distrito_judiciales dj on me.id_dist_judicial= dj.id 
inner join organo_jurisdiccionales oj on me.id_org_juris=oj.id 
inner join empleados e2 on me.id_empleado=e2.id  
inner join personas p on e2.id_persona=p.id ';
	
	v_where = ' Where 1=1  ';
	
	If p_id_expediente<>'' Then
	 v_where:=v_where||'And me.id_expediente = '''||p_id_expediente||''' ';
	End If;
	
	EXECUTE ('SELECT count(1) '||v_tabla||v_where) INTO v_count;
	v_col_count:=' ,'||v_count||' as TotalRows ';

	If v_count::Integer > p_limit::Integer then
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By me.id Desc LIMIT '||p_limit||' OFFSET '||p_pagina||';'; 
	else
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By me.id Desc;'; 
	End If;
	
	--Raise Notice '%',v_scad;
	Open p_ref For Execute(v_scad);
	Return p_ref;
End

$function$
;


