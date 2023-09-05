CREATE OR REPLACE FUNCTION public.sp_listar_persona_paginado(p_documento character varying, p_persona character varying, p_estado character varying, p_pagina character varying, p_limit character varying, p_ref refcursor)
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
	
	v_campos=' t1.id,t1.id_tipo_documento,t1.documento,t1.nombres||'' ''||t1.a_paterno||'' ''||t1.a_materno persona,
	t1.estado ';

	v_tabla='from personas t1 ';
	
	v_where = ' Where 1=1  ';
	--v_where = ' Where t1.estado=''1''  ';

	If p_estado<>'' Then
	 v_where:=v_where||'And t1.estado = '''||p_estado||''' ';
	End If;
	
	If p_documento<>'' Then
	 v_where:=v_where||'And t1.documento ilike ''%'||p_documento||'%'' ';
	End If;
	
	If p_persona<>'' Then
	 v_where:=v_where||'And t1.nombres||'' ''||t1.a_paterno||'' ''||t1.a_materno ilike ''%'||p_persona||'%'' ';
	End If;

	EXECUTE ('SELECT count(1) '||v_tabla||v_where) INTO v_count;
	v_col_count:=' ,'||v_count||' as TotalRows ';

	If v_count::Integer > p_limit::Integer then
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By t1.id Desc LIMIT '||p_limit||' OFFSET '||p_pagina||';'; 
	else
		v_scad:='SELECT '||v_campos||v_col_count||v_tabla||v_where||' Order By t1.id Desc;'; 
	End If;
	
	--Raise Notice '%',v_scad;
	Open p_ref For Execute(v_scad);
	Return p_ref;
End
$function$
;