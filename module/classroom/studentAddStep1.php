                    <fieldset>
                        <legend>เพิ่มนักเรียน</legend>
                        <form name="studentSearch" id="studentSearch">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" name="classroom_name" id="classroom_name">
                                        <option value="" disabled selected style="display: none;">เลือกระดับชั้นเดิม</option>
                                            <option value="1">อนุบาล 1</option>
                                            <option value="2">อนุบาล 2</option>
                                            <option value="31">อนุบาล 3</option>
                                            <option value="3">ป.1</option>
                                            <option value="4">ป.2</option>
                                            <option value="5">ป.3</option>
                                            <option value="6">ป.4</option>
                                            <option value="7">ป.5</option>
                                            <option value="8">ป.6</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" name="student_type" id="student_type">
                                        <option value="" disabled selected style="display: none;">เลือกประเภท</option>
                                            <option value="1">นักเรียนใหม่</option>
                                            <option value="2">นักเรียนปัจจุบัน</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="classroom_id" id="classroom_id" value="<?= $classroom_id ?>">
                            <input type="hidden" name="classroom_name_for_add" id="classroom_name_for_add" value="<?= $classroom_name ?>">
                            <div class="col-md-2">
                                <a onclick="student_search('module/classroom/action/studentSearch.php', 'studentSearch')" class="btn btn-success" ><i class="fa fa-search"></i> ค้นหา</a>
                            </div>
                        </form>
                        
                        <div class="col-md-12">
                            <div id="subcontent" align="center"></div>
                            <div align="center" id="process"></div>
                        </div>
                        
                    </fieldset>