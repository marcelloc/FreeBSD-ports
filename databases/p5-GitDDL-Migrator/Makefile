# $FreeBSD$

PORTNAME=	GitDDL-Migrator
PORTVERSION=	0.07
CATEGORIES=	databases perl5
MASTER_SITES=	CPAN
MASTER_SITE_SUBDIR=	CPAN:SONGMU
PKGNAMEPREFIX=	p5-

MAINTAINER=	kuriyama@FreeBSD.org
COMMENT=	Perl extension to extended p5-GitDDL

LICENSE=	ART10 GPLv1
LICENSE_COMB=	dual

RUN_DEPENDS=	\
	p5-GitDDL>=0.03:${PORTSDIR}/databases/p5-GitDDL \
	p5-Mouse>0:${PORTSDIR}/devel/p5-Mouse \
	p5-SQL-Translator>0:${PORTSDIR}/databases/p5-SQL-Translator
BUILD_DEPENDS=	${RUN_DEPENDS}

USES=		perl5
USE_PERL5=	modbuild
NO_ARCH=	YES

.include <bsd.port.mk>
