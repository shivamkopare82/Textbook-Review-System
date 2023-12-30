<?php
    // Database connection parameters
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Table A fields
        $textbook_id = $_POST['textbook_id'];
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $numberOfAuthors = isset($_POST['number_of_authors']) ? $_POST['number_of_authors'] : null;
        $qualification = isset($_POST['qualification']) ? $_POST['qualification'] : null;
        $experience = isset($_POST['experience']) ? $_POST['experience'] : null;
        $expertise = isset($_POST['expertise']) ? $_POST['expertise'] : null;
        $sumA = $numberOfAuthors + $qualification + $experience + $expertise;


        // Table B fields

        $publisherCredibility = isset($_POST['publisher_credibility']) ? $_POST['publisher_credibility'] : null;
        $sumB = $publisherCredibility;
        // Add form fields and SQL insert statements for other tables
        // Table C
        $uniqueness_score = isset($_POST['uniqueness_score']) ? $_POST['uniqueness_score'] : null;
        $uniqueness_conveyed_clearly = isset($_POST['uniqueness_conveyed_clearly']) ? $_POST['uniqueness_conveyed_clearly'] : null;
        $stayed_focused_on_uniqueness = isset($_POST['stayed_focused_on_uniqueness']) ? $_POST['stayed_focused_on_uniqueness'] : null;
        $deals_with_curriculum_syllabus = isset($_POST['deals_with_curriculum_syllabus']) ? $_POST['deals_with_curriculum_syllabus'] : null;
        $sumC = $uniqueness_score + $uniqueness_conveyed_clearly + $stayed_focused_on_uniqueness + $deals_with_curriculum_syllabus;

        // Table D fields
        $cover_attractiveness = isset($_POST['cover_attractiveness']) ? $_POST['cover_attractiveness'] : null;
        $cover_relevance = isset($_POST['cover_relevance']) ? $_POST['cover_relevance'] : null;
        $book_dimensions = isset($_POST['book_dimensions']) ? $_POST['book_dimensions'] : null;
        $book_bulkiness = isset($_POST['book_bulkiness']) ? $_POST['book_bulkiness'] : null;
        $paper_quality = isset($_POST['paper_quality']) ? $_POST['paper_quality'] : null;
        $printing_colors = isset($_POST['printing_colors']) ? $_POST['printing_colors'] : null;
        $page_layout = isset($_POST['page_layout']) ? $_POST['page_layout'] : null;
        $font_type = isset($_POST['font_type']) ? $_POST['font_type'] : null;
        $font_size = isset($_POST['font_size']) ? $_POST['font_size'] : null;
        $font_consistency = isset($_POST['font_consistency']) ? $_POST['font_consistency'] : null;
        $teaching_hours = isset($_POST['teaching_hours']) ? $_POST['teaching_hours'] : null;
        $learning_objectives = isset($_POST['learning_objectives']) ? $_POST['learning_objectives'] : null;
        $introductory_section = isset($_POST['introductory_section']) ? $_POST['introductory_section'] : null;
        $table_of_contents = isset($_POST['table_of_contents']) ? $_POST['table_of_contents'] : null;
        $abbreviations = isset($_POST['abbreviations']) ? $_POST['abbreviations'] : null;
        $chapter_summary = isset($_POST['chapter_summary']) ? $_POST['chapter_summary'] : null;
        $text_structure = isset($_POST['text_structure']) ? $_POST['text_structure'] : null;
        $content_activities = isset($_POST['content_activities']) ? $_POST['content_activities'] : null;
        $topic_distribution = isset($_POST['topic_distribution']) ? $_POST['topic_distribution'] : null;
        $highlighted_keywords = isset($_POST['highlighted_keywords']) ? $_POST['highlighted_keywords'] : null;
        $mistakes_and_reiteration = isset($_POST['mistakes_and_reiteration']) ? $_POST['mistakes_and_reiteration'] : null;

        $sumD = $cover_attractiveness + $cover_relevance + $book_dimensions + $book_bulkiness + $paper_quality + $printing_colors + $page_layout + $font_type + $font_size + $font_consistency + $teaching_hours + $learning_objectives + $introductory_section + $table_of_contents + $abbreviations + $chapter_summary + $text_structure + $content_activities + $topic_distribution + $highlighted_keywords + $mistakes_and_reiteration;



        // Table E fields
        $classical_references = isset($_POST['classical_references']) ? $_POST['classical_references'] : null;
        $recent_advances = isset($_POST['recent_advances']) ? $_POST['recent_advances'] : null;
        $interpreted_concluded = isset($_POST['interpreted_concluded']) ? $_POST['interpreted_concluded'] : null;
        $clear_accurate = isset($_POST['clear_accurate']) ? $_POST['clear_accurate'] : null;
        $comprehensiveness = isset($_POST['comprehensiveness']) ? $_POST['comprehensiveness'] : null;
        $self_explanatory = isset($_POST['self_explanatory']) ? $_POST['self_explanatory'] : null;
        $supported_references = isset($_POST['supported_references']) ? $_POST['supported_references'] : null;
        $consistency_to_curriculum = isset($_POST['consistency_to_curriculum']) ? $_POST['consistency_to_curriculum'] : null;
        $understandable_to_learners = isset($_POST['understandable_to_learners']) ? $_POST['understandable_to_learners'] : null;
        $facilitating_students_learn = isset($_POST['facilitating_students_learn']) ? $_POST['facilitating_students_learn'] : null;
        $promoting_higher_order = isset($_POST['promoting_higher_order']) ? $_POST['promoting_higher_order'] : null;
        $well_formed_content = isset($_POST['well_formed_content']) ? $_POST['well_formed_content'] : null;
        $clear_meaning = isset($_POST['clear_meaning']) ? $_POST['clear_meaning'] : null;
        $focused_content = isset($_POST['focused_content']) ? $_POST['focused_content'] : null;
        $definitions_explained = isset($_POST['definitions_explained']) ? $_POST['definitions_explained'] : null;
        $balanced_viewpoints = isset($_POST['balanced_viewpoints']) ? $_POST['balanced_viewpoints'] : null;
        $no_bias_content = isset($_POST['no_bias_content']) ? $_POST['no_bias_content'] : null;
        $no_discrimination = isset($_POST['no_discrimination']) ? $_POST['no_discrimination'] : null;
        $resources_for_reading = isset($_POST['resources_for_reading']) ? $_POST['resources_for_reading'] : null;
        $bibliography_citations = isset($_POST['bibliography_citations']) ? $_POST['bibliography_citations'] : null;

        $sumE = $classical_references + $recent_advances + $interpreted_concluded + $clear_accurate + $comprehensiveness + $self_explanatory + $supported_references + $consistency_to_curriculum + $understandable_to_learners + $facilitating_students_learn + $promoting_higher_order + $well_formed_content + $clear_meaning + $focused_content + $definitions_explained + $balanced_viewpoints + $no_bias_content + $no_discrimination + $resources_for_reading + $bibliography_citations;

        // Table F fields
        $language_simple = isset($_POST['language_simple']) ? $_POST['language_simple'] : null;
        $standard_technical_terminology = isset($_POST['standard_technical_terminology']) ? $_POST['standard_technical_terminology'] : null;
        $standard_punctuation_marks_symbols = isset($_POST['standard_punctuation_marks_symbols']) ? $_POST['standard_punctuation_marks_symbols'] : null;
        $language_accurate_precise = isset($_POST['language_accurate_precise']) ? $_POST['language_accurate_precise'] : null;
        $context_clues_for_difficult_terms = isset($_POST['context_clues_for_difficult_terms']) ? $_POST['context_clues_for_difficult_terms'] : null;
        $free_from_grammatical_mistakes = isset($_POST['free_from_grammatical_mistakes']) ? $_POST['free_from_grammatical_mistakes'] : null;
        $free_from_fragments_runon_complex_sentences = isset($_POST['free_from_fragments_runon_complex_sentences']) ? $_POST['free_from_fragments_runon_complex_sentences'] : null;
        $correct_capitalization_spelling_paragraphs = isset($_POST['correct_capitalization_spelling_paragraphs']) ? $_POST['correct_capitalization_spelling_paragraphs'] : null;

        $sumF = $language_simple + $standard_technical_terminology + $standard_punctuation_marks_symbols + $language_accurate_precise + $context_clues_for_difficult_terms + $free_from_grammatical_mistakes + $free_from_fragments_runon_complex_sentences + $correct_capitalization_spelling_paragraphs;

        // Table G fields
        $colour = isset($_POST['colour']) ? $_POST['colour'] : null;
        $clarity_resolution = isset($_POST['clarity_resolution']) ? $_POST['clarity_resolution'] : null;
        $visibility_color = isset($_POST['visibility_color']) ? $_POST['visibility_color'] : null;
        $labelling = isset($_POST['labelling']) ? $_POST['labelling'] : null;
        $relevance_to_content = isset($_POST['relevance_to_content']) ? $_POST['relevance_to_content'] : null;

        $sumG = $colour + $clarity_resolution + $visibility_color + $labelling + $relevance_to_content;

        // Table H fields
        $data_fabrication = isset($_POST['data_fabrication']) ? $_POST['data_fabrication'] : null;
        $plagiarism = isset($_POST['plagiarism']) ? $_POST['plagiarism'] : null;
        $citation_bias = isset($_POST['citation_bias']) ? $_POST['citation_bias'] : null;


        // Insert data into Author Credibility table
        $sqlGetTextbookTitle = "SELECT title FROM textbooks WHERE textbook_id = ?";
        $stmtGetTextbookTitle = $conn->prepare($sqlGetTextbookTitle);
        $stmtGetTextbookTitle->bind_param("i", $textbook_id);
        $stmtGetTextbookTitle->execute();
        $stmtGetTextbookTitle->bind_result($textbookTitle);
        $stmtGetTextbookTitle->fetch();
        $stmtGetTextbookTitle->close();

        $sqlAuthor = "INSERT INTO `authorcredibility` (textbook_id, textbook_title, name, number_of_authors, qualification, experience, expertise, sumA) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtAuthor = $conn->prepare($sqlAuthor);
        $stmtAuthor->bind_param("issiiiii", $textbook_id, $textbookTitle, $name, $numberOfAuthors, $qualification, $experience, $expertise, $sumA);
        $stmtAuthor->execute();
        $stmtAuthor->close();

        // Insert data into Publisher Credibility table
        $sqlPublisher = "INSERT INTO `publishercredibility` (publisher_credibility, sumB) VALUES (?, ?)";
        $stmtPublisher = $conn->prepare($sqlPublisher);
        $stmtPublisher->bind_param("ii", $publisherCredibility, $sumB);
        $stmtPublisher->execute();
        $stmtPublisher->close();

        // Insert data into Table C
        $sqlTableC = "INSERT INTO `generalassessment` (uniqueness_score, uniqueness_conveyed_clearly, stayed_focused_on_uniqueness, deals_with_curriculum_syllabus, sumC) VALUES (?, ?, ?, ?, ?)";
        $stmtTableC = $conn->prepare($sqlTableC);
        $stmtTableC->bind_param("iiiii", $uniqueness_score, $uniqueness_conveyed_clearly, $stayed_focused_on_uniqueness, $deals_with_curriculum_syllabus, $sumC);
        $stmtTableC->execute();
        $stmtTableC->close();

        // Insert data into Table D
        $sqlTableD = "INSERT INTO `physicalappearancestructure` (cover_attractiveness, cover_relevance, book_dimensions, book_bulkiness, paper_quality, printing_colors, page_layout, font_type, font_size, font_consistency, teaching_hours, learning_objectives, introductory_section, table_of_contents, abbreviations, chapter_summary, text_structure, content_activities, topic_distribution, highlighted_keywords, mistakes_and_reiteration, sumD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtTableD = $conn->prepare($sqlTableD);
        $stmtTableD->bind_param("iiiiiiiiiiiiiiiiiiiiii", $cover_attractiveness, $cover_relevance, $book_dimensions, $book_bulkiness, $paper_quality, $printing_colors, $page_layout, $font_type, $font_size, $font_consistency, $teaching_hours, $learning_objectives, $introductory_section, $table_of_contents, $abbreviations, $chapter_summary, $text_structure, $content_activities, $topic_distribution, $highlighted_keywords, $mistakes_and_reiteration, $sumD);
        $stmtTableD->execute();
        $stmtTableD->close();

        // Insert data into Table E
        $sqlTableE = "INSERT INTO `subjectmatter` (classical_references, recent_advances, interpreted_concluded, clear_accurate, comprehensiveness, self_explanatory, supported_references, consistency_to_curriculum, understandable_to_learners, facilitating_students_learn, promoting_higher_order, well_formed_content, clear_meaning, focused_content, definitions_explained, balanced_viewpoints, no_bias_content, no_discrimination, resources_for_reading, bibliography_citations, sumE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtTableE = $conn->prepare($sqlTableE);
        $stmtTableE->bind_param("iiiiiiiiiiiiiiiiiiiii", $classical_references, $recent_advances, $interpreted_concluded, $clear_accurate, $comprehensiveness, $self_explanatory, $supported_references, $consistency_to_curriculum, $understandable_to_learners, $facilitating_students_learn, $promoting_higher_order, $well_formed_content, $clear_meaning, $focused_content, $definitions_explained, $balanced_viewpoints, $no_bias_content, $no_discrimination, $resources_for_reading, $bibliography_citations, $sumE);
        $stmtTableE->execute();
        $stmtTableE->close();

        // Insert data into Table F
        $sqlTableF = "INSERT INTO `languageassessment` (language_simple, standard_technical_terminology, standard_punctuation_marks_symbols, language_accurate_precise, context_clues_for_difficult_terms, free_from_grammatical_mistakes, free_from_fragments_runon_complex_sentences, correct_capitalization_spelling_paragraphs, sumF) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtTableF = $conn->prepare($sqlTableF);
        $stmtTableF->bind_param("iiiiiiiii", $language_simple, $standard_technical_terminology, $standard_punctuation_marks_symbols, $language_accurate_precise, $context_clues_for_difficult_terms, $free_from_grammatical_mistakes, $free_from_fragments_runon_complex_sentences, $correct_capitalization_spelling_paragraphs, $sumF);
        $stmtTableF->execute();
        $stmtTableF->close();

        // Insert data into Table G
        $sqlTableG = "INSERT INTO `illustrations` (colour, clarity_resolution, visibility_color, labelling, relevance_to_content, sumG) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtTableG = $conn->prepare($sqlTableG);
        $stmtTableG->bind_param("iiiiii", $colour, $clarity_resolution, $visibility_color, $labelling, $relevance_to_content, $sumG);
        $stmtTableG->execute();
        $stmtTableG->close();

        // Insert data into Table H
        $sqlTableH = "INSERT INTO `ethicalissues` (data_fabrication, plagiarism, citation_bias) VALUES (?, ?, ?)";
        $stmtTableH = $conn->prepare($sqlTableH);
        $stmtTableH->bind_param("iii", $data_fabrication, $plagiarism, $citation_bias);
        $stmtTableH->execute();
        $stmtTableH->close();

        // Continue adding form fields and SQL insert statements for Tables D to I

        // Close the connection
        $conn->close();

        echo "Data inserted into multiple tables successfully.";
    }
    ?>