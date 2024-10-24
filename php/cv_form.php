

<div class = "about-cnt">
                <form id="cv-form" action="index2.php" method="POST" enctype="multipart/form-data" class="cv-form">


                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>about section</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">First Name</label>
                                        <input name = "firstname" type = "text" class = "form-control firstname" id = "" onkeyup="generateCV()" placeholder="e.g. Ariva">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Middle Name <span class = "opt-text">(optional)</span></label>
                                        <input name = "middlename" type = "text" class = "form-control middlename" id = "" onkeyup="generateCV()" placeholder="e.g Lorentza">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Last Name</label>
                                        <input name = "lastname" type = "text" class = "form-control lastname" id = "" onkeyup="generateCV()" placeholder="e.g. Zweena">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Your Image</label>
                                        <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="previewImage()">
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Designation</label>
                                        <input name = "designation" type = "text" class = "form-control designation" id = "" onkeyup="generateCV()" placeholder="e.g. Web programmer">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Address</label>
                                        <input name = "address" type = "text" class = "form-control address" id = "" onkeyup="generateCV()" placeholder="e.g. Cilebut barat, sukaraja">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-2">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Email</label>
                                        <input name = "email" type = "text" class = "form-control email" id = "" onkeyup="generateCV()" placeholder="e.g. ariva02zweena@gmail.com">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Phone No:</label>
                                        <input name = "mobileno" type = "text" class = "form-control mobileno" id = "" onkeyup="generateCV()" placeholder="e.g. +62 123-456-7890">
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                                <div class = "cols-2">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Self description</label>
                                        <textarea name="summary" class="form-control summary" id="" onkeyup="generateCV()" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;"></textarea>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>Certifications</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-a">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-achievement">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name="group-a[0][achieve_title]" type="text" class="form-control achieve_title" placeholder="e.g. Web design, 2024" style="width: 204%;">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name="group-a[0][achieve_description]" class="form-control achieve_description" style="width: 204%;" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn" id="add-certification-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>experience</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-b">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name="group-b[0][exp_title]" type="text" class="form-control exp_title" placeholder="e.g Web developer">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" placeholder="e.g SMK PESAT ITXPRO">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" placeholder="e.g Bogor, Indonesia">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                        
                                            <div class="cols-2">
                                                <div class="form-elem">
                                                    <label for="exp_start_date" class="form-label">Start Date</label>
                                                    <input name="exp_start_date" type="text" class="form-control exp_start_date" id="exp_start_date" placeholder="02-09-2007">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class="form-elem">
                                                    <label for="exp_end_date" class="form-label">End Date</label>
                                                    <input name="exp_end_date" type="text" class="form-control exp_end_date" id="exp_end_date" placeholder="02-12-2004">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class="cols-2">
                                                <div class="form-elem">
                                                    <label for="exp_description" class="form-label">Description</label>
                                                    <textarea name="exp_description" type="text" class="form-control exp_description" id="exp_description" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>education</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-c">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()" placeholder="e.g SMK INFORMATIKA PESAT">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class="form-elem">
                                                    <label for="edu_degree_input" class="form-label">Majors</label>
                                                    <input name="edu_degree" type="text" class="form-control edu_degree" id="" placeholder="e.g Rekayasa perangkat lunak">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">City</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()" placeholder="e.g Bogor, Indonesia">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "edu_start_date" type = "text" class = "form-control edu_start_date" id = "edu_start_date" onkeyup="generateCV()" placeholder="20-05-2013">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "edu_graduation_date" type = "text" class = "form-control edu_graduation_date" id = "edu_graduation_date" onkeyup="generateCV()" placeholder="29-12-2040">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>projects</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-d">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project Name</label>
                                                    <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="generateCV()" placeholder="e.g Sistem voting osis" style="width: 204%;">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <textarea name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()" placeholder="e.g. Lorem ipsum odor amet, consectetuer adipiscing elit. Integer integer mauris tempor hac netus ut habitant finibus. Placerat arcu egestas duis suspendisse nisl, tristique placerat dis" style="width: 204%;"></textarea>
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>skills</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-e">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-skills">
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Skill</label>
                                                <input name = "skill" type = "text" class = "form-control skill" id = "" onkeyup="generateCV()" placeholder="e.g PHP">
                                                <span class="form-text"></span>
                                            </div>
                                            
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>
                        <div class="form-row">
        <button type="submit" name="submit" class="submit-btn">Save CV</button>
    </div>
                    </form>
                </div>