// BFI2/Results.jsx
import React, { useState, useEffect } from 'react';
import {
  useDataProvider,
  Loading,
  useNotify,
  useGetOne,
  Title
} from 'react-admin';
import { useParams } from 'react-router-dom';
import {
  Radar,
  RadarChart,
  PolarGrid,
  PolarAngleAxis,
  PolarRadiusAxis,
  ResponsiveContainer,
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend
} from 'recharts';
import {
  Card,
  CardContent,
  Typography,
  Box,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Paper,
  Tabs,
  Tab,
  Divider
} from '@mui/material';

const BFI2Results = () => {
  const { id } = useParams();
  const [tabValue, setTabValue] = useState(0);
  const [domainResults, setDomainResults] = useState([]);
  const [facetResults, setFacetResults] = useState([]);
  const [domains, setDomains] = useState([]);
  const [facets, setFacets] = useState([]);
  const [loading, setLoading] = useState(true);

  const dataProvider = useDataProvider();
  const notify = useNotify();

  // Obtener datos de la evaluación
  const { data: assessment, isLoading: isAssessmentLoading } = useGetOne(
    'assessments',
    { id },
    { enabled: !!id }
  );

  const selectedLanguage = assessment?.language || 'en';

  useEffect(() => {
    const loadResults = async () => {
      if (!assessment) return;

      try {
        setLoading(true);

        // Cargar dominios
        const { data: domainsData } = await dataProvider.getList('domains', {
          pagination: { page: 1, perPage: 10 },
          sort: { field: 'id', order: 'ASC' },
          filter: {}
        });
        setDomains(domainsData);

        // Cargar facetas
        const { data: facetsData } = await dataProvider.getList('facets', {
          pagination: { page: 1, perPage: 50 },
          sort: { field: 'id', order: 'ASC' },
          filter: {}
        });
        setFacets(facetsData);

        // Cargar resultados de dominios
        const { data: domainResultsData } = await dataProvider.getList('results', {
          pagination: { page: 1, perPage: 10 },
          sort: { field: 'id', order: 'ASC' },
          filter: {
            assessment_id: assessment.id,
            type: 'domain'
          }
        });
        setDomainResults(domainResultsData);

        // Cargar resultados de facetas
        const { data: facetResultsData } = await dataProvider.getList('results', {
          pagination: { page: 1, perPage: 50 },
          sort: { field: 'id', order: 'ASC' },
          filter: {
            assessment_id: assessment.id,
            type: 'facet'
          }
        });
        setFacetResults(facetResultsData);

        setLoading(false);
      } catch (error) {
        notify('Error loading results', 'error');
        console.error(error);
      }
    };

    if (assessment) {
      loadResults();
    }
  }, [assessment, dataProvider, notify]);

  // Preparar datos para el gráfico radar de dominios
  const prepareRadarData = () => {
    if (!domainResults.length || !domains.length) return [];

    return [
      domainResults.reduce((acc, result) => {
        const domain = domains.find(d => d.id === result.trait_id);
        if (domain) {
          acc[selectedLanguage === 'en' ? domain.name_en : domain.name_es] = result.score;
        }
        return acc;
      }, {})
    ];
  };

  // Preparar datos para el gráfico de barras de facetas
  const prepareBarData = () => {
    if (!facetResults.length || !facets.length) return [];

    return facetResults.map(result => {
      const facet = facets.find(f => f.id === result.trait_id);
      if (!facet) return null;

      const domain = domains.find(d => d.id === facet.domain_id);

      return {
        name: selectedLanguage === 'en' ? facet.name_en : facet.name_es,
        score: result.score,
        domain: domain ? (selectedLanguage === 'en' ? domain.name_en : domain.name_es) : ''
      };
    }).filter(Boolean);
  };

  // Cambiar de pestaña
  const handleTabChange = (event, newValue) => {
    setTabValue(newValue);
  };

  // Obtener color por dominio
  const getDomainColor = (domainName) => {
    const colorMap = {
      'Extraversion': '#FF6384',
      'Extraversión': '#FF6384',
      'Agreeableness': '#36A2EB',
      'Amabilidad': '#36A2EB',
      'Conscientiousness': '#FFCE56',
      'Responsabilidad': '#FFCE56',
      'Negative Emotionality': '#4BC0C0',
      'Neuroticismo': '#4BC0C0',
      'Open-Mindedness': '#9966FF',
      'Apertura': '#9966FF'
    };

    return colorMap[domainName] || '#999999';
  };

  // Interpretar puntaje
  const interpretScore = (score) => {
    if (score >= 4.5) return selectedLanguage === 'en' ? 'Very High' : 'Muy Alto';
    if (score >= 3.5) return selectedLanguage === 'en' ? 'High' : 'Alto';
    if (score >= 2.5) return selectedLanguage === 'en' ? 'Average' : 'Promedio';
    if (score >= 1.5) return selectedLanguage === 'en' ? 'Low' : 'Bajo';
    return selectedLanguage === 'en' ? 'Very Low' : 'Muy Bajo';
  };

  if (loading || isAssessmentLoading) return <Loading />;

  const radarData = prepareRadarData();
  const barData = prepareBarData();

  return (
    <Box sx={{ maxWidth: 1000, margin: '0 auto' }}>
      <Title title={selectedLanguage === 'en' ? 'BFI-2 Assessment Results' : 'Resultados de Evaluación BFI-2'} />

      <Card>
        <CardContent>
          <Typography variant="h5" gutterBottom sx={{ mb: 3 }}>
            {selectedLanguage === 'en' ? 'Your Personality Profile' : 'Tu Perfil de Personalidad'}
          </Typography>

          <Tabs value={tabValue} onChange={handleTabChange} sx={{ mb: 3 }}>
            <Tab label={selectedLanguage === 'en' ? 'Overview' : 'Resumen'} />
            <Tab label={selectedLanguage === 'en' ? 'Domains' : 'Dominios'} />
            <Tab label={selectedLanguage === 'en' ? 'Facets' : 'Facetas'} />
          </Tabs>

          <Divider sx={{ mb: 4 }} />

          {/* Overview Tab */}
          {tabValue === 0 && (
            <Box>
              <Typography variant="h6" gutterBottom>
                {selectedLanguage === 'en' ? 'Domain Overview' : 'Resumen de Dominios'}
              </Typography>

              <Box sx={{ height: 400, mb: 4 }}>
                <ResponsiveContainer width="100%" height="100%">
                  <RadarChart data={radarData} margin={{ top: 10, right: 30, bottom: 10, left: 30 }}>
                    <PolarGrid />
                    <PolarAngleAxis
                      dataKey="name"
                      tick={{ fill: '#666', fontSize: 14 }}
                      tickFormatter={(value) => {
                        // Get first part of the domain name to avoid long labels
                        const parts = value.split(' ');
                        return parts[0];
                      }}
                    />
                    <PolarRadiusAxis domain={[0, 5]} />
                    <Radar
                      name={selectedLanguage === 'en' ? 'Score' : 'Puntaje'}
                      dataKey="value"
                      stroke="#8884d8"
                      fill="#8884d8"
                      fillOpacity={0.6}
                    />
                    <Tooltip />
                  </RadarChart>
                </ResponsiveContainer>
              </Box>

              <Typography variant="h6" gutterBottom>
                {selectedLanguage === 'en' ? 'Facet Scores' : 'Puntajes de Facetas'}
              </Typography>

              <Box sx={{ height: 500 }}>
                <ResponsiveContainer width="100%" height="100%">
                  <BarChart
                    data={barData}
                    layout="vertical"
                    margin={{ top: 5, right: 30, left: 20, bottom: 5 }}
                  >
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis type="number" domain={[0, 5]} />
                    <YAxis
                      dataKey="name"
                      type="category"
                      tick={{ fontSize: 12 }}
                      width={150}
                    />
                    <Tooltip />
                    <Legend />
                    <Bar
                      dataKey="score"
                      name={selectedLanguage === 'en' ? 'Score' : 'Puntaje'}
                      fill="#8884d8"
                    />
                  </BarChart>
                </ResponsiveContainer>
              </Box>
            </Box>
          )}

          {/* Domains Tab */}
          {tabValue === 1 && (
            <Box>
              <Typography variant="body1" paragraph>
                {selectedLanguage === 'en'
                  ? 'The Big Five personality domains represent the broadest level of the personality hierarchy.'
                  : 'Los dominios de personalidad de los Cinco Grandes representan el nivel más amplio de la jerarquía de personalidad.'}
              </Typography>

              <TableContainer component={Paper} sx={{ mb: 4 }}>
                <Table>
                  <TableHead>
                    <TableRow>
                      <TableCell>{selectedLanguage === 'en' ? 'Domain' : 'Dominio'}</TableCell>
                      <TableCell align="center">{selectedLanguage === 'en' ? 'Score' : 'Puntaje'}</TableCell>
                      <TableCell align="center">{selectedLanguage === 'en' ? 'Level' : 'Nivel'}</TableCell>
                      <TableCell>{selectedLanguage === 'en' ? 'Description' : 'Descripción'}</TableCell>
                    </TableRow>
                  </TableHead>
                  <TableBody>
                    {domainResults.map((result) => {
                      const domain = domains.find(d => d.id === result.trait_id);
                      if (!domain) return null;

                      return (
                        <TableRow key={result.id}>
                          <TableCell component="th" scope="row">
                            <Typography fontWeight="bold">
                              {selectedLanguage === 'en' ? domain.name_en : domain.name_es}
                            </Typography>
                          </TableCell>
                          <TableCell align="center">{result.score.toFixed(2)}</TableCell>
                          <TableCell align="center">{interpretScore(result.score)}</TableCell>
                          <TableCell>
                            {selectedLanguage === 'en' ? domain.description_en : domain.description_es}
                          </TableCell>
                        </TableRow>
                      );
                    })}
                  </TableBody>
                </Table>
              </TableContainer>
            </Box>
          )}

          {/* Facets Tab */}
          {tabValue === 2 && (
            <Box>
              <Typography variant="body1" paragraph>
                {selectedLanguage === 'en'
                  ? 'Facets are more specific personality traits that make up each of the broader domains.'
                  : 'Las facetas son rasgos de personalidad más específicos que componen cada uno de los dominios más amplios.'}
              </Typography>

              {domains.map(domain => {
                const domainFacets = facets.filter(f => f.domain_id === domain.id);
                const facetResultsForDomain = facetResults.filter(r => {
                  const facet = facets.find(f => f.id === r.trait_id);
                  return facet && facet.domain_id === domain.id;
                });

                if (!domainFacets.length || !facetResultsForDomain.length) return null;

                return (
                  <Box key={domain.id} sx={{ mb: 4 }}>
                    <Typography variant="h6" sx={{ mb: 2, color: getDomainColor(selectedLanguage === 'en' ? domain.name_en : domain.name_es) }}>
                      {selectedLanguage === 'en' ? domain.name_en : domain.name_es}
                    </Typography>

                    <TableContainer component={Paper}>
                      <Table>
                        <TableHead>
                          <TableRow>
                            <TableCell>{selectedLanguage === 'en' ? 'Facet' : 'Faceta'}</TableCell>
                            <TableCell align="center">{selectedLanguage === 'en' ? 'Score' : 'Puntaje'}</TableCell>
                            <TableCell align="center">{selectedLanguage === 'en' ? 'Level' : 'Nivel'}</TableCell>
                            <TableCell>{selectedLanguage === 'en' ? 'Description' : 'Descripción'}</TableCell>
                          </TableRow>
                        </TableHead>
                        <TableBody>
                          {facetResultsForDomain.map((result) => {
                            const facet = facets.find(f => f.id === result.trait_id);
                            if (!facet) return null;

                            return (
                              <TableRow key={result.id}>
                                <TableCell component="th" scope="row">
                                  <Typography fontWeight="bold">
                                    {selectedLanguage === 'en' ? facet.name_en : facet.name_es}
                                  </Typography>
                                </TableCell>
                                <TableCell align="center">{result.score.toFixed(2)}</TableCell>
                                <TableCell align="center">{interpretScore(result.score)}</TableCell>
                                <TableCell>
                                  {selectedLanguage === 'en' ? facet.description_en : facet.description_es}
                                </TableCell>
                              </TableRow>
                            );
                          })}
                        </TableBody>
                      </Table>
                    </TableContainer>
                  </Box>
                );
              })}
            </Box>
          )}
        </CardContent>
      </Card>
    </Box>
  );
};

export default BFI2Results;
