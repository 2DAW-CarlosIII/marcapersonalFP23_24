// BFI2/Assessment.jsx
import React, { useState, useEffect } from 'react';
import {
  Button,
  useNotify,
  useRedirect,
  Loading,
  useDataProvider,
  useTranslate
} from 'react-admin';
import {
    LinearProgress,
    Stepper,
    Step,
    StepLabel,
    Paper,
    Box,
    Card,
    CardContent,
    FormControlLabel,
    Radio,
    RadioGroup,
    Typography,
} from '@mui/material';
import ArrowBackIcon from '@mui/icons-material/ArrowBack';
import ArrowForwardIcon from '@mui/icons-material/ArrowForward';
import CheckCircleIcon from '@mui/icons-material/CheckCircle';

const BFI2Assessment = () => {
  const [loading, setLoading] = useState(true);
  const [questions, setQuestions] = useState([]);
  const [domains, setDomains] = useState([]);
  const [responses, setResponses] = useState({});
  const [currentStep, setCurrentStep] = useState(0);
  const [activeSection, setActiveSection] = useState(0);
  const [language, setLanguage] = useState('en');
  const [assessment, setAssessment] = useState(null);

  const dataProvider = useDataProvider();
  const notify = useNotify();
  const redirect = useRedirect();
  const translate = useTranslate();

  // Grupos de preguntas (12 preguntas por sección, 5 secciones)
  const QUESTIONS_PER_SECTION = 12;
  const totalSections = 5;

  useEffect(() => {
    const loadData = async () => {
      try {
        // Cargar dominios
        const { data: domainsData } = await dataProvider.getList('domains', {
          pagination: { page: 1, perPage: 10 },
          sort: { field: 'id', order: 'ASC' },
          filter: {}
        });
        setDomains(domainsData);

        // Cargar preguntas
        const { data: questionsData } = await dataProvider.getList('questions', {
          pagination: { page: 1, perPage: 100 },
          sort: { field: 'id', order: 'ASC' },
          filter: {}
        });
        setQuestions(questionsData);

        // Crear una nueva evaluación
        const { data: newAssessment } = await dataProvider.create('assessments', {
          data: {
            status: 'in_progress',
            language: language
          }
        });
        setAssessment(newAssessment);

        setLoading(false);
      } catch (error) {
        notify('Error loading assessment data', 'error');
        console.error(error);
      }
    };

    loadData();
  }, [dataProvider, notify, language]);

  // Manejar cambio de respuesta
  const handleResponseChange = (questionId, value) => {
    setResponses(prev => ({
      ...prev,
      [questionId]: parseInt(value, 10)
    }));
  };

  // Cambiar sección
  const handleSectionChange = (newSection) => {
    if (newSection >= 0 && newSection < totalSections) {
      setActiveSection(newSection);
      // Calcular el punto de inicio para el stepper
      setCurrentStep(newSection);
    }
  };

  // Enviar respuestas
  const submitResponses = async () => {
    try {
      setLoading(true);

      // Verificar que todas las preguntas han sido respondidas
      const totalQuestions = questions.length;
      const answeredQuestions = Object.keys(responses).length;

      if (answeredQuestions < totalQuestions) {
        notify(`Please answer all questions. ${answeredQuestions} of ${totalQuestions} completed.`, 'warning');
        setLoading(false);
        return;
      }

      // Preparar respuestas para enviar
      const responsesToSubmit = Object.entries(responses).map(([questionId, value]) => ({
        assessment_id: assessment.id,
        question_id: parseInt(questionId, 10),
        value: value
      }));

      // Enviar respuestas en lotes
      for (const response of responsesToSubmit) {
        await dataProvider.create('responses', {
          data: response
        });
      }

      // Marcar la evaluación como completada
      await dataProvider.update('assessments', {
        id: assessment.id,
        data: {
          status: 'completed',
          completed_at: new Date().toISOString()
        }
      });

      notify('Assessment completed successfully', 'success');
      redirect('show', 'results', assessment.id);
    } catch (error) {
      notify('Error submitting responses', 'error');
      console.error(error);
    } finally {
      setLoading(false);
    }
  };

  // Cambiar idioma
  const toggleLanguage = () => {
    setLanguage(prev => prev === 'en' ? 'es' : 'en');
  };

  const getSectionQuestions = () => {
    const start = activeSection * QUESTIONS_PER_SECTION;
    const end = start + QUESTIONS_PER_SECTION;
    return questions.slice(start, end);
  };

  const calculateProgress = () => {
    const answeredQuestions = Object.keys(responses).length;
    return (answeredQuestions / questions.length) * 100;
  };

  if (loading) return <Loading />;

  return (
    <Box sx={{ maxWidth: 800, margin: '0 auto' }}>
      <Card>
        <CardContent>
          <Typography variant="h5" gutterBottom>
            {language === 'en' ? 'Big Five Inventory-2 (BFI-2)' : 'Inventario de los Cinco Grandes-2 (BFI-2)'}
          </Typography>

          <Box sx={{ display: 'flex', justifyContent: 'space-between', mb: 2 }}>
            <Button
              variant="outlined"
              onClick={toggleLanguage}
            >
              {language === 'en' ? 'Cambiar a Español' : 'Switch to English'}
            </Button>

            <Typography variant="body2" sx={{ fontStyle: 'italic' }}>
              {language === 'en'
                ? `${Object.keys(responses).length} of ${questions.length} questions answered`
                : `${Object.keys(responses).length} de ${questions.length} preguntas respondidas`}
            </Typography>
          </Box>

          <LinearProgress
            variant="determinate"
            value={calculateProgress()}
            sx={{ height: 10, borderRadius: 5, mb: 4 }}
          />

          <Stepper activeStep={currentStep} alternativeLabel sx={{ mb: 4 }}>
            {domains.map((domain, index) => (
              <Step key={domain.id}>
                <StepLabel>{language === 'en' ? domain.name_en : domain.name_es}</StepLabel>
              </Step>
            ))}
          </Stepper>

          <Box sx={{ mb: 4 }}>
            <Paper elevation={3} sx={{ p: 3 }}>
              {getSectionQuestions().map((question) => (
                <Box key={question.id} sx={{ mb: 3 }}>
                  <Typography variant="body1" sx={{ mb: 1, fontWeight: 'bold' }}>
                    {language === 'en' ? question.text_en : question.text_es}
                  </Typography>

                  <RadioGroup
                    row
                    value={responses[question.id] || ''}
                    onChange={(e) => handleResponseChange(question.id, e.target.value)}
                  >
                    <Box sx={{ display: 'flex', justifyContent: 'space-between', width: '100%' }}>
                      <FormControlLabel value="1" control={<Radio />} label={language === 'en' ? 'Disagree strongly' : 'Muy en desacuerdo'} />
                      <FormControlLabel value="2" control={<Radio />} label={language === 'en' ? 'Disagree a little' : 'En desacuerdo'} />
                      <FormControlLabel value="3" control={<Radio />} label={language === 'en' ? 'Neutral' : 'Neutral'} />
                      <FormControlLabel value="4" control={<Radio />} label={language === 'en' ? 'Agree a little' : 'De acuerdo'} />
                      <FormControlLabel value="5" control={<Radio />} label={language === 'en' ? 'Agree strongly' : 'Muy de acuerdo'} />
                    </Box>
                  </RadioGroup>
                </Box>
              ))}
            </Paper>
          </Box>

          <Box sx={{ display: 'flex', justifyContent: 'space-between' }}>
            <Button
              variant="contained"
              startIcon={<ArrowBackIcon />}
              onClick={() => handleSectionChange(activeSection - 1)}
              disabled={activeSection === 0}
            >
              {language === 'en' ? 'Previous' : 'Anterior'}
            </Button>

            {activeSection < totalSections - 1 ? (
              <Button
                variant="contained"
                endIcon={<ArrowForwardIcon />}
                onClick={() => handleSectionChange(activeSection + 1)}
                color="primary"
              >
                {language === 'en' ? 'Next' : 'Siguiente'}
              </Button>
            ) : (
              <Button
                variant="contained"
                endIcon={<CheckCircleIcon />}
                onClick={submitResponses}
                color="success"
                disabled={Object.keys(responses).length < questions.length}
              >
                {language === 'en' ? 'Submit' : 'Enviar'}
              </Button>
            )}
          </Box>
        </CardContent>
      </Card>
    </Box>
  );
};

export default BFI2Assessment;
